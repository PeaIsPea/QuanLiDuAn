<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders =  DB::table('orders')
            ->get();
        return view('admin.order.order', ['orders' => $orders]);
    }
    public function detail()
    {
        $details =  DB::table('order_details')
            ->get();
        return view('admin.order.detail', ['details' => $details]);
    }

    
    // Orders shouldn't be delete by anyone except user
    // public function delete($id)
    // {
    //     DB::table('order_details')
    //         ->where('order_id', '=', $id)
    //         ->delete();
    //     Order::destroy($id);
    //     return redirect('admin/order');
    // }
}
