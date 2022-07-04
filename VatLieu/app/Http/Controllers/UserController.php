<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword ="";
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
        }
        $users = User::where('last_name', 'LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request)->all();
        $request -> validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'dob' => 'required',
                'avatar' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],
    
            [
                'required' => ':attribute không được để trống',
                'password.min' => ':attribute phải nhiều hơn :min kí tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công'
            ],
    
            [
                'first_name' => 'Họ',
                'last_name' => 'Tên',
                'dob' => 'Ngày sinh',
                'avatar' => 'Avatar',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'password' => 'Mật khẩu'
            ]
           );

        if($request->hasFile('avatar')){
            $name = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/uploads/avatar/',$name);
            $avatar = 'storage/uploads/avatar/'.$name;

            User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'dob' => $request->input('dob'),
                'avatar' => $avatar,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'role_id' => $request->input('role_id'),
                'password' => Hash::make($request->input('password'))
            ]);
                return to_route('admin.users.index')->with('status','Thêm user thành công');
        }     
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
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit' , compact('user', 'roles'));
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
        $user = User::find($id);
        $request -> validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'dob' => 'required',
                'avatar' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],
    
            [
                'required' => ':attribute không được để trống',
                'password.min' => ':attribute phải nhiều hơn :min kí tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công'
            ],
    
            [
                'first_name' => 'Họ',
                'last_name' => 'Tên',
                'dob' => 'Ngày sinh',
                'avatar' => 'Avatar',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'password' => 'Mật khẩu'
            ]
           );
        
        if(request()->hasFile('avatar'))
        {
            $path = $user->avatar;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        if($request->hasFile('avatar')){
            $name = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/uploads/avatar/',$name);
            $avatar = 'storage/uploads/avatar/'.$name;

            User::where('id',$id)->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'dob' => $request->input('dob'),
                'avatar' => $avatar,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'role_id' => $request->input('role_id'),
                'password' => Hash::make($request->input('password'))
            ]);
                return to_route('admin.users.index')->with('status','Cập nhật thành công');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        $user = User::find($id);
        $path = $user->avatar;
        if(File::exists($path))
        {                
            File::delete($path);
        }
        $user->delete();
        return to_route('admin.users.index')->with('status','Xóa Thành Công');
    }
}
