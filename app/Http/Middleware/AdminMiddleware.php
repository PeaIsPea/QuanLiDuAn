<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUserId = auth()->user()->id;
        $user = User::find($currentUserId);

        if (!auth()->check() || !$user->hasAnyPermission(Permission::PERMISSIONS)) {
            // User doesn't have roles, redirect to the admin login page
            auth()->logout();
            toastr()->error('','Bạn không có quyền hạn, vui lòng đăng nhập lại');
            return redirect()->route('adminloginform');
        }

        return $next($request);
    }
}
