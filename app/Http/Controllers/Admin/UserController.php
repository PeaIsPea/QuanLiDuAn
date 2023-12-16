<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();

        return view(
            'admin.user.user',
            [
                'users' => $users,
                'roles' => $roles
            ]
        );
    }

    public function create()
    {
        return view('admin.user.user');
    }

    public function store(Request $request)
    {
        if (Gate::allows('addUser')) {
            $request->validate(
                [
                    'name' => [
                        'required',
                        'string',
                        'max:20',
                    ],
                    'email' => [
                        'required',
                        'email',
                    ],
                    'password' => [
                        'required',
                        'min:8'
                    ],
                    'roles' => [
                        'required',
                        'array'
                    ]
                ],
                [
                    'name.required' => 'Thiếu tên!',
                    'name.string' => 'Tên không hợp lệ',
                    'name.max' => 'Tên không quá 20 ký tự',
                    'email.email' => 'Email không hợp lệ',
                    'email.required' => 'Thiếu email',
                    'password.min' => 'Mật khẩu tối thiểu 8 ký tự',
                    'roles.required' => 'Thiếu roles!',
                    'roles.array' => 'Role không hợp lệ'
                ]
            );

            $data = [
                'name' => $request->filled('name') ? $request->input('name') : "",
                'email' => $request->filled('email') ? $request->input('email') : "",
                'password' => $request->filled('password') ? Hash::make($request->input('password')) : Hash::make("password"),
                'verified' => $request->has('verified') ? 1 : 1
            ];

            $user = User::create($data);
            $roles = $request->get('roles');

            $user->assignRole($roles);

            toastr()->success('', 'Thêm thành công');
            return redirect()->back();
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edituser', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // echo $id;
        // dd($request);
        if (Gate::allows('editUser')) {
            $request->validate(
                [
                    'user_name' => [
                        'string'
                    ],
                    'gender' => [
                        Rule::in(User::GENDERS)
                    ],
                    'biography' => [
                        'nullable',
                        'string'
                    ],
                    'address' => [
                        'nullable',
                        'string'
                    ],
                    'roles_array' => [
                        'array',
                        'sometimes'
                    ]
                ],
                [
                    'gender.in' => 'Giới tính không hợp lệ, vui lòng chọn lại!',
                    'biography.string' => 'Tiểu sử không hợp lệ',
                    'address.string' => 'Địa chỉ không hợp lệ',
                    'user_name.string' => 'Tên không hợp lệ',
                    'roles.array' => 'Role không hợp lệ'
                ]
            );

            $user = User::find($id);

            $data = [
                'name' => $request->filled('user_name') ? $request->input('user_name') : $user->name,
                'gender' => $request->filled('gender') ? $request->input('gender') : $user->gender,
                'biography' => $request->filled('biography') ? $request->input('biography') : $user->biography,
                'address' => $request->filled('address') ? $request->input('address') : $user->address,
                'verified' => $request->filled('verified') ? 1 : 1
            ];

            $roles = $request->get('roles_array');

            if ($roles && count($roles) > 0) {
                if (count($user->getRoleNames()) <= count($roles)) {
                    $user->assignRole($roles);
                } else {
                    $user->syncRoles($roles);
                }
            }

            DB::table('users')->where('id', $id)->update($data);


            toastr()->success('', 'Cập nhật thành công');
            return redirect()->back();
        }

        toastr()->error('', 'Bạn không có đủ quyền hạn');
        return redirect()->back();
    }

    public function delete($id)
    {
    }
}
