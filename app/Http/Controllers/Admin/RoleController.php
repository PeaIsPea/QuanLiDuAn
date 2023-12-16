<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role as ModelRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        // foreach ($roles[0]->permissions as $key => $value) {
        //     echo $value . ", ";
        // }

        return view(
            'admin.role.role',
            [
                'roles' => $roles,
                'permissions' => $permissions,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('addRole')) {
            $request->validate(
                [
                    'permissions' => [
                        'required',
                        'array',
                    ],
                    'name' => [
                        'required',
                        'string',
                        'max:30'
                    ]
                ],
                [
                    'permissions.required' => 'Vui lòng gán permission cho role!',
                    'permissions.array' => 'Permission không hợp lệ, vui lòng thử lại',
                    'permissions.in' => 'Permission không hợp lệ, vui lòng thử lại',
                    'name.required' => 'Thiếu tên!',
                    'name.string' => 'Tên không hợp lệ!',
                    'name.max' => 'Tên không dài quá 30 ký tự'
                ]
            );

            $roles = ModelRole::create(['name' => $request->get('name')]);

            $roles->syncPermissions($request->get('permissions'));

            toastr()->success('', 'Tạo thành công');
            return redirect()->back();
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('editRole')) {
            $request->validate(
                [
                    'permissions' => [
                        'array',
                        'nullable'
                    ],
                    'role_name' => [
                        'string',
                        'max:30'
                    ]
                ],
                [
                    'permissions.array' => 'Permission không hợp lệ, vui lòng thử lại',
                    'permissions.in' => 'Permission không hợp lệ, vui lòng thử lại',
                    'role_name.string' => 'Tên không hợp lệ!',
                    'role_name.max' => 'Tên không dài quá 30 ký tự'
                ]
            );

            $name = $request->get('role_name');
            $permissions = $request->get('permissions');

            $role = ModelRole::findById($id);
            // If the $permissions array have more permission than $role permissions
            // then syncPermissions
            if (count($role->permissions) <= count($permissions)) {
                $role->givePermissionTo($permissions);
            } else {
                $role->syncPermissions($permissions);
            }

            if ($name) {
                DB::table(Role::retrieveTableName())
                    ->where('id', '=', $id)
                    ->update(
                        [
                            'name' => $name
                        ]
                    );
            }

            toastr()->success('', 'Cập nhật thành công');
            return redirect()->back();
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Gate::allows('deleteRole')) {
            $tableNames = config('permission.table_names');

            $isExist = DB::table($tableNames['model_has_roles'])
                ->where('role_id', '=', $id)
                ->exists();

            if ($isExist) {
                toastr()->warning('', 'Thất bại, vẫn còn user thuộc role');
                return redirect()->back();
            }

            DB::table(Role::retrieveTableName())
                ->where('id', '=', $id)
                ->update(
                    [
                        'is_active' => false,
                        'updated_at' => Carbon::now()
                    ]
                );

            toastr()->success('', 'Vô hiệu hóa thành công');
            return redirect()->back();
        }


        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }

    /**
     * Activate the specified role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        if (Gate::allows('activateRole')) {
            DB::table(Role::retrieveTableName())
                ->where('id', '=', $id)
                ->update(
                    [
                        'is_active' => 1,
                        'updated_at' => Carbon::now()
                    ]
                );

            toastr()->success('', 'Kích hoạt thành công');
            return redirect()->back();
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }
}
