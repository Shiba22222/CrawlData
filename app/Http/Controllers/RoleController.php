<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRoleRequest;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Hiển thị danh sách các tài khoản đã đăng kí hoặc được tạo
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);

        return view('admins.roles.index',compact('roles'));
    }

    /**
     * Chuyển sang trang tạo sản phẩm
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admins.roles.create',compact('permissions'));
    }

    /**
     * Tạo tài khoản
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:roles,name',
//            'permission' => 'required',
//        ]);

        $data = $request->validated();
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);

        return redirect()->route('roles.index')
            ->with('message','Thêm quyền thành công');
    }

    /**
     * trang show quyền có thể vào trang nào
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = $role->permissions;

        return view('admins.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Chuyển sang trang chỉnh sửa
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();

        return view('admins.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    /**
     * Chỉnh sửa quyền
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoleRequest $request, Role $role)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'permission' => 'required',
//        ]);
        $data = $request->validated();
        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);

        return redirect()->route('roles.index')
            ->with('message','Cập nhật quyền thành công');
    }

    /**
     * Xóa quyền
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back()
            ->with('success','Xóa quyền thành công');
    }
}
