<?php

namespace App\Http\Controllers;

use App\Common\GlobalVariable;
use App\Models\Game;
use App\Models\Order;
use App\Common\Helper;
use App\Models\Key;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        // dd($request);
        $id = $request->get('id');
        $game = Game::findOrFail($id);

        $cart = session()->get('cart', []);

        // If the game already in the cart, increase the amount
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $game->id,
                'name' => $game->name,
                'price' => $game->price,
                'image' => $game->image,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        toastr()->success('', 'Thêm vào giỏ hàng thành công');
        return redirect()->back();
    }

    public function buyNow(Request $request)
    {
        $this->addToCart($request);

        return redirect()->route('cart');
    }

    public function updateCart(Request $request)
    {
        try {
            if ($request->id && $request->quantity) {
                $game = Game::withCount(['keys as available_keys' => function ($query) {
                    $query->where('is_redeemed', 0);
                }])->findOrFail($request->id);

                if ($game->available_keys >= $request->quantity) {
                    $cart = session()->get('cart');
                    $cart[$request->id]["quantity"] = $request->quantity;
                    session()->put('cart', $cart);

                    toastr()->success('', 'Cập nhật thành công');
                    return response()->json(['success' => true]);
                } else {
                    toastr()->error('', 'Đã hết key!');
                    return response()->json(['success' => false]);
                }
            }
        } catch (\Exception $ex) {
            toastr()->error('', 'Something went wrong');
            return response()->json(['success' => false]);
        }
    }

    public function removeItemFromCart(Request $request)
    {
        // If has the id, remove it
        $cart = session()->get('cart');
        if ($request->id) {
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            toastr()->info('', 'Xóa sản phẩm thành công');
            return redirect()->back();
        }
        // If the request has 'clear_all', remove the entire cart
        if ($request->has('clear_all')) {
            session()->put('cart', null);

            toastr()->info('', 'Xóa giỏ hàng thành công');
            return redirect()->back()->with('clear_cart_success', "Xóa giỏ hàng thành công");
        }
        return redirect()->back()->with('unknow_error', "Something went wrong");
    }

    public function vnpayCheckoutSuccess(Request $request)
    {
        $user = Auth::user();

        // Get order info from the redirect URL after a successful pay
        $orderInfo = json_decode($request->vnp_OrderInfo, true);
        $orderTotal = ($request->vnp_Amount) / 100;
        $orderIdRef = $request->vnp_TxnRef;
        $payType = Order::PAY_TYPE[0];

        // Insert then get the newly added order id
        // The order stay at Pending status until user got email
        $orderId = DB::table(Order::retrieveTableName())
            ->insertGetId(
                [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'total' => $orderTotal,
                    'pay_type' => $payType,
                    'order_id_ref' => $orderIdRef,
                ]
            );

        $ids = array();
        // Map every value and insert to the order detail
        collect($orderInfo)->map(function ($value, $key) use ($orderId, &$ids) {
            $ids[] = ["game_id" => $key, "quantity" => $value];
            $game = Game::find($key);
            DB::table('order_details')
                ->insert(
                    [
                        'order_id' => $orderId,
                        'game_id' => $game->id,
                        'name' => $game->name,
                        'price' => $game->price,
                        'quantity' => $value
                    ]
                );
        });

        $this->sendKeyEmail($ids, $orderIdRef);

        // Clear the cart
        session()->put('cart', null);
        return redirect()->route('cart')
            ->with(
                'order_success',
                [
                    "Thanh toán thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi \n",
                    "Chúng tôi sẽ gửi cho bạn 1 email chứa key của game bạn đã mua \n",
                    "Email có thể đến chậm!"
                ]
            );
    }

    public function payVnpay(Request $request)
    {
        $cart = session()->get('cart');
        $keys = [];
        $quantity = [];

        foreach ($cart as $key => $value) {
            $keys[] = $key;
            $quantity[] = $cart[$key]['quantity'];
        }
        $newCart = array_combine($keys, $quantity);

        $vnp_Url = env('VNPAY_URL');
        $vnp_Returnurl = "http://localhost:8000/checkout/successVnpay";
        $vnp_TmnCode = env('VNPAY_TERMINAL_CODE'); //Mã website tại VNPAY 
        $vnp_HashSecret = env('VNPAY_SECRET_CODE'); //Chuỗi bí mật

        $vnp_TxnRef = Str::upper(Str::random(8)); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = json_encode($newCart);
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->get('total') * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State = $_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        // "vnp_ExpireDate" => $vnp_ExpireDate,
        // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
        // "vnp_Bill_Email" => $vnp_Bill_Email,
        // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
        // "vnp_Bill_LastName" => $vnp_Bill_LastName,
        // "vnp_Bill_Address" => $vnp_Bill_Address,
        // "vnp_Bill_City" => $vnp_Bill_City,
        // "vnp_Bill_Country" => $vnp_Bill_Country,
        // "vnp_Inv_Phone" => $vnp_Inv_Phone,
        // "vnp_Inv_Email" => $vnp_Inv_Email,
        // "vnp_Inv_Customer" => $vnp_Inv_Customer,
        // "vnp_Inv_Address" => $vnp_Inv_Address,
        // "vnp_Inv_Company" => $vnp_Inv_Company,
        // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
        // "vnp_Inv_Type" => $vnp_Inv_Type

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function cancelOrder($id)
    {
        DB::table(Order::retrieveTableName())
            ->where('order_id_ref', '=', $id)
            ->update(
                [
                    'order_status' => Order::ORDER_STATUS[2],
                    'updated_at' => Carbon::now()
                ]
            );

        toastr()->success('', 'Hủy thành công');
        return redirect()->back();
    }

    public function sendKeyEmail($ids, $orderIdRef)
    {
        $keys = array();

        $htmlFilePath = base_path() . '\resources/html/sendKey.html';
        $htmlContent = file_get_contents($htmlFilePath);

        $email = DB::table(Order::retrieveTableName())
            ->where('order_id_ref', '=', $orderIdRef)
            ->first();
        $orderDate = date('d-m-Y', strtotime($email->created_at));

        collect($ids)->map(function ($value) use (&$keys) {
            $game = DB::table(Game::retrieveTableName())
                ->where('id', '=', $value['game_id'])
                ->first();

            $cdKeys = [];
            for ($i = 1; $i <= $value['quantity']; $i++) {
                $cdKey = DB::table(Key::retrieveTableName())
                    ->where('game_id', '=', $value['game_id'])
                    ->where('is_expired', '=', 0)
                    ->where('is_redeemed', '=', 0)
                    ->inRandomOrder()
                    ->first('cd_key');

                while (in_array($cdKey->cd_key, $cdKeys)) {
                    $cdKey = DB::table(Key::retrieveTableName())
                        ->where('game_id', '=', $value['game_id'])
                        ->where('is_expired', '=', 0)
                        ->where('is_redeemed', '=', 0)
                        ->inRandomOrder()
                        ->first('cd_key');
                }

                $cdKeys[] = Helper::decrypt($cdKey->cd_key, 'cdkey');
            }

            $keys[] = [
                "game_name" => $game->name,
                "cd_key" => $cdKeys
            ];
        });

        $greeting = "We want to express our heartfelt gratitude for choosing our services for your recent purchase. Your support means the world to us, and we are committed to providing you with exceptional products and service.";

        $orderInfo = "<table>
        <tr>
          <td style='text-align: left; font-weight: bold;'>Order Number: </td>
          <td>&nbsp;</td>
          <td style='text-align: right;'>$orderIdRef</td>
        </tr>
          <tr>
          <td style='text-align: left; font-weight: bold;'>Order Date: </td>
          <td>&nbsp;</td>
          <td style='text-align: right;'>$orderDate</td>
        </tr>
      </table>";

        $keyResult = "";
        foreach ($keys as $value) {
            $name = $value['game_name'];
            $keyResult .= "<h4>$name</h4>";
            foreach ($value['cd_key'] as $value) {
                $keyResult .= "
                    <p>$value</p>
                ";

                DB::table(Key::retrieveTableName())
                    ->where('cd_key', '=', Helper::encrypt($value, 'cdkey'))
                    ->update(
                        [
                            'is_redeemed' => 1,
                            'updated_at' => Carbon::now()
                        ]
                    );
            }
        }

        $htmlContent = str_replace('{{greeting}}', $greeting, $htmlContent);
        $htmlContent = str_replace('{{orderInfo}}', $orderInfo, $htmlContent);
        $htmlContent = str_replace('{{keyResult}}', $keyResult, $htmlContent);

        try {
            Helper::sendMail($email->email, 'Thank you for your order!', $htmlContent);


            DB::table(Order::retrieveTableName())
                ->where('order_id_ref', '=', $orderIdRef)
                ->update(
                    [
                        'order_status' => Order::ORDER_STATUS[1],
                        'updated_at' => Carbon::now(),
                    ]
                );

            return redirect()->back();
        } catch (\Exception $ex) {
            Helper::changeKey();
            $this->sendKeyEmail($ids, $orderIdRef);
        }
    }
}
