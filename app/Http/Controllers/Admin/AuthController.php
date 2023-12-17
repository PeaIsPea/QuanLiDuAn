<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("admin.login");
    }

    public function info()
    {
        return view('admin.info');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            // Authentication successful
            $userId = Auth::user()->id;
            $user = User::find($userId);
            if ($user->hasRole(Role::ROLES)) {
                // User have the roles, redirect to the admin dashboard
                toastr()->success('', 'Đăng nhập thành công');
                return redirect()->route('admindashboard');
            } else {
                // User is not an admin, redirect to the normal website
                toastr()->error('', 'Bạn không có quyền hạn');
                return redirect()->route('adminloginform');
            }
        }

        // Authentication failed, redirect back to the login page with error message
        toastr()->error('', 'Sai thông tin tài khoản');
        return redirect()->route('adminloginform');
    }

    public function logout()
    {
        auth()->logout();

        // Redirect to the admin login page after logout
        return redirect()->route('adminloginform');
    }
}
