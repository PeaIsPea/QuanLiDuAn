<?php

namespace App\Http\Controllers;

use App\Common\Helper;
use App\Models\User;
use App\Common\Constant;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use PhpParser\Node\Expr\Cast\Bool_;

class AuthController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function login()
    {
        return view('login');
    }

    public function createUser(Request $request)
    {
        $request->validate(
            [
                'email' => [
                    'required',
                    'email'
                ],
                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],
                'password' => [
                    'required',
                    'confirmed',
                    'min:8'
                ]
            ],
            [
                'email.required' => "Thiếu email!",
                'email.email' => "Email không hợp lệ!",

                'name.required' => "Thiếu họ và tên!",
                'name.string' => "Tên đăng nhập cần phải là 1 chuỗi ký tự chữ",
                'name.max' => "Tên đăng nhập tối đa 255 ký tự",

                'password.required' => "Thiếu mật khẩu!",
                'password.confirmed' => "Mật khẩu không trùng khớp",
                'password.min' => "Mật khẩu phải từ 8 ký tự trở lên"
            ]
        );

        $userExist = DB::table('users')
            ->where('email', '=', $request->get('email'))
            ->first();

        if ($userExist == null) {
            try {
                $otp = Str::random(Constant::OTP_LENGTH);
                User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'otp' => $otp,
                    'last_sent' => (new DateTime)->format('Y-m-d H:i:s'),
                    'password' => Hash::make($request->get('password'))
                ]);

                $this->sendSignupMail($request->get('email'), $otp);
            } catch (\Exception $ex) {
                Helper::changeKey();
                $this->createUser($request);
            }

            return redirect()->back()->with('signup_success', 'Đăng ký thành công');;;
        }

        return redirect(route('signup'))->with('user_already_exist', 'Email đã tồn tại!');;
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => "Thiếu email!",
                'email.email' => "Email không hợp lệ!",
                'password.required' => "Thiếu mật khẩu!"
            ]
        );

        $checkVerify = DB::table('users')
            ->where('email', '=', $request->get('email'))
            ->first();

        if ($checkVerify->verified !== 1) {
            toastr()->warning('', 'Bạn chưa xác thực tài khoản!');
            return redirect()->back();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('index'));
        }

        return redirect(route('login'))->with('user_not_found', 'Tài khoản không tồn tại hoặc sai mật khẩu, vui lòng kiểm tra lại!');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginGoogle()
    {
        config(['https.verify' => false]);
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleUser()
    {
        $userGoogle = Socialite::driver('google')->user();

        $userExist = DB::table('users')
            ->where('social_id', '=', $userGoogle->getId())
            ->first();

        if (!$userExist) {
            $user = DB::table('users')
                ->insertGetId(
                    [
                        'name' => $userGoogle->getName(),
                        'email' => $userGoogle->getEmail(),
                        'password' => Hash::make(Str::random(8)),
                        'social' => User::SOCIALS[2],
                        'social_id' => $userGoogle->getId(),
                        'verified' => 1
                    ]
                );

            Auth::loginUsingId($user);
            return redirect(route('index'));
        }

        Auth::loginUsingId($userExist->id);

        return redirect(route('index'));
    }

    public function loginFacebook()
    {
        config(['https.verify' => false]);
        return Socialite::driver('facebook')->redirect();
    }

    public function loginFacebookUser()
    {
        $userFB = Socialite::driver('facebook')->user();

        $userExist = DB::table('users')
            ->where('social_id', '=', $userFB->getId())
            ->first();

        if (!$userExist) {
            $user = DB::table('users')
                ->insertGetId(
                    [
                        'name' => $userFB->getName(),
                        'email' => $userFB->getEmail(),
                        'password' => Hash::make(Str::random(8)),
                        'social' => User::SOCIALS[1],
                        'social_id' => $userFB->getId(),
                        'verified' => 1
                    ]
                );

            Auth::loginUsingId($user);
            return redirect(route('index'));
        }

        Auth::loginUsingId($userExist->id);

        return redirect(route('index'));
    }

    public function sendSignupMail($email, $otp)
    {
        $htmlFilePath = base_path() . '\resources/html/mailVerify.html';
        $htmlContent = file_get_contents($htmlFilePath);

        $link = env('APP_URL') . '/auth/verify?email=' . $email . "&otp=$otp";

        $htmlContent = str_replace('{{linkVerify}}', $link, $htmlContent);
        Helper::sendMail($email, 'Verify Account', $htmlContent);
    }

    public function sendResetPasswordMail(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'email' => [
                    'email',
                    'required'
                ]
            ]
        );

        if ($validate->fails()) {
            toastr()->error("", "Thiếu email!");
            return redirect()->route('forgotPassword');
        }

        $email = $request->get('email');
        $otp = Str::random(Constant::OTP_LENGTH);
        $user = User::where('email', '=', $email)->first();

        if ($user->social && $user->social !== User::SOCIALS[0]) {
            // Check if the user is from social login
            toastr()->error("", "Email không hợp lệ, vui lòng kiểm tra lại");
            return redirect()->back();
        } else {
            User::where('email', '=', $email)
                ->update(
                    [
                        'otp' => $otp,
                        'last_sent' => Carbon::now()
                    ]
                );
            $htmlFilePath = base_path() . '\resources/html/resetPassword.html';
            $htmlContent = file_get_contents($htmlFilePath);

            $link = env('APP_URL') . '/resetPassword?email=' . $email . "&otp=$otp";

            $htmlContent = str_replace('{{linkResetPassword}}', $link, $htmlContent);
            try {
                Helper::sendMail($email, 'Reset Password', $htmlContent);
                toastr()->success('', "Gửi thành công, hãy kiểm tra email của bạn");
                return redirect()->back();
            } catch (\Exception $ex) {
                Helper::changeKey();
                $this->sendResetPasswordMail($request);
            }
        }
    }

    public function checkTimeout($email)
    {
        try {
            $user = User::where('email', '=', $email)->first();
            $dateFormat = 'Y-m-d H:i:s';

            $startTime = DateTime::createFromFormat($dateFormat, $user->last_sent);
            $currentTime = DateTime::createFromFormat($dateFormat, (new DateTime)->format($dateFormat));

            $timePassed = $currentTime->getTimestamp() - $startTime->getTimestamp();

            $expired = Constant::VERIFY_EXPIRED_TIME - $timePassed;

            return $expired > 0 ? false : true;
        } catch (\Exception $ex) {
            Helper::getResponse('', $ex->getMessage());
        }
    }

    public function verifyAccount(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'email' => [
                        'required',
                        'email'
                    ],
                    'otp' => [
                        'required'
                    ]
                ]
            );

            if ($validate->fails()) {
                toastr()->error('', $validate->errors());
                return redirect()->route('index');
            }

            $user = User::where('email', '=', $request->get('email'))->first();
            if ($user->verified === 1) {
                // Check if the user is already verified
                toastr()->error('', 'Tài khoản của bạn đã được xác thực từ trước!');
                return redirect()->route('index');
            } else {
                if ($this->checkTimeout($user->email)) {
                    // Check if verify request is timeout yet
                    $otp = Str::random(Constant::OTP_LENGTH);
                    User::where('email', '=', $user->email)
                        ->update(
                            [
                                'otp' => $otp,
                                'last_sent' => (new DateTime)->format('Y-m-d H:i:s')
                            ]
                        );
                    $this->sendSignupMail($user->email, $otp);

                    session()->flash('otp_expired', 'OTP hết hạn');
                    return view('verify');
                } else {
                    User::where('email', '=', $user->email)
                        ->update(
                            [
                                'verified' => 1
                            ]
                        );

                    session()->flash('account_verified', 'Xác thực thành công');
                    return view('verify');
                }
            }
        } catch (\Exception $ex) {
            Helper::getResponse('', $ex->getMessage());
            toastr()->error("Nếu bạn thấy thông báo này hãy báo lỗi", "Something went wrong");
            return redirect()->route('index');
        }
    }

    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    public function resetPasswordForm(Request $request)
    {
        try {
            $validate = Validator::make(
                $request->all(),
                [
                    'email' => [
                        'required',
                        'email'
                    ],
                    'otp' => [
                        'required'
                    ]
                ]
            );

            if ($validate->fails()) {
                toastr()->error('', $validate->errors());
                return redirect()->route('resetForm');
            }

            if ($this->checkTimeout($request->get('email'))) {
                toastr()->error('', 'OTP hết hạn, vui lòng kiểm tra email');
                return redirect()->route('index');
            } else {
                return view('resetPassword', [
                    'email' => $request->get('email'),
                    'otp' => $request->get('otp')
                ]);
            }
        } catch (\Exception $ex) {
            Helper::getResponse('', $ex->getMessage());
            toastr()->error("Nếu bạn thấy thông báo này hãy báo lỗi", "Something went wrong");
            return redirect()->route('index');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate(
            [
                'email' => [
                    'required',
                    'email'
                ],
                'otp' => [
                    'required'
                ],
                'new_password' => [
                    'required',
                    'confirmed',
                    'min:8'
                ]
            ],
            [
                'new_password.required' => 'Thiếu mật khẩu mới!',
                'new_password.confirmed' => 'Mật khẩu không trùng khớp!',
                'new_password.min' => 'Mật khẩu phải từ 8 ký tự trở lên!'
            ]
        );

        try {
            $user = User::where('email', '=', $request->get('email'))->first();

            if ($request->get('otp') === $user->otp) {
                DB::table('users')
                    ->where('email', '=', $request->get('email'))
                    ->update(
                        [
                            'password' => Hash::make($request->get('new_password'))
                        ]
                    );
                toastr()->success('', "Thay đổi mật khẩu thành công!");
                return redirect()->route('login');
            } else {
                toastr()->error('', "URL đổi mật khẩu có vấn đề, vui lòng thử lại");
                return redirect()->back();
            }
        } catch (\Exception $ex) {
            Helper::getResponse('', $ex->getMessage());
            toastr()->error($ex->getMessage(), "Something went wrong");
            return redirect()->route('index');
        }
    }
}
