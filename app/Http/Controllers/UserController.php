<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Hiển thị ra tất cả tài khoản
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();

        return view('admins.users.index',compact('users','roles'));
    }

    /**
     * Chuyển sang trang tạo tài khoản
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('admins.users.create',compact('roles'));
    }

    /**
     * Tạo tài khoản
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
//        $this->validate($request,[
//            'name' => 'required',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required|same:confirm-password',
//            'roles' => 'required'
//        ]);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->assignRole($data['roles']);

        return redirect()->route('user.index')
            ->with('message', 'Tạo tài khoản thành công');
    }

    /**
     * Trang hiển thị thông tin tài khoản
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);

        if (empty($users)){
            return back()->with('message', 'Có lỗi mời kiểm tra lại thao tác');
        }

        $roles = Role::pluck('name','name')->all();

        return view('admins.users.show',compact('users'));
    }

    /**
     * Chuyển sang trang chỉnh sửa tài khoản
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)){
            return back()->with('message', 'Có lỗi mời kiểm tra lại thao tác');
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admins.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Chỉnh sửa tài khoản
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|email|unique:users,email,'.$id,
//            'password' => 'same:confirm-password',
//            'roles' => 'required'
//        ]);
        $data = $request->validated();

        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            $input = Arr::except($data,array('password'));
        }
        $user = User::find($id);

        $user->update($data);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($data['roles']);

        return redirect()->route('user.index')->with('message', 'Sửa tài khoản thành công');
    }

    /**
     * Xóa tài khoản
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        if (empty($user)){
            return back()->with('message', 'Có lỗi mời kiểm tra lại thao tác');
        }

        return redirect(route('user.index'))->with('message', 'Xóa tài khoản thành công');
    }
}
