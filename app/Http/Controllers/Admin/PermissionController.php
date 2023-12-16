<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission as ModelPermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permission.permission', ['permissions' => $permissions]);
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
        if (Gate::allows('addPermission')) {
            $request->validate(
                [
                    'permission_name' => [
                        'required',
                        'string',
                        'max:30',
                        'unique:permissions,name'
                    ]
                ],
                [
                    'permission_name.unique' => 'Permission đã tồn tại!',
                    'permission_name.required' => "Thiếu tên!",
                    'permission_name.string' => "Tên không hợp lệ",
                    'permission_name.max' => "Tên không vượt quá 30 ký tự"
                ]
            );

            $name = $request->get('permission_name');

            ModelPermission::create(
                [
                    'name' => $name,
                    'guard_name' => 'web'
                ]
            );

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
        if (Gate::allows('editPermission')) {
            $request->validate(
                [
                    'name' => [
                        'string',
                        'max:30'
                    ]
                ],
                [
                    'name.string' => "Tên không hợp lệ",
                    'name.max' => "Tên không vượt quá 30 ký tự"
                ]
            );

            $name = $request->get('name');

            DB::table(Permission::retrieveTableName())
                ->where('id', '=', $id)
                ->update(
                    [
                        'name' => $name,
                        'updated_at' => Carbon::now()
                    ]
                );

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
        if (Gate::allows('deletePermission')) {
            $tableNames = config('permission.table_names');

            $isExist = DB::table($tableNames['role_has_permissions'])
                ->where('permission_id', '=', $id)
                ->exists();

            if ($isExist) {
                toastr()->warning('', 'Thất bại, vẫn còn role thuộc permission');
                return redirect()->back();
            }

            DB::table(Permission::retrieveTableName())
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
     * Activate the specified permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        if (Gate::allows('activatePermission')) {
            DB::table(Permission::retrieveTableName())
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
