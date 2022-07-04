@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa thông tin người dùng
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-6">
                <div class="form-group">
                    <label for="first_name">Họ</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Tên</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}">
                    @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Ngày sinh</label>
                    <input class="form-control" type="date" name="dob" id="dob" value="{{ $user->dob }}">
                    @error('dob')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input class="form-control" type="file" name="avatar" id="avatar" value="{{ $user->avatar }}">
                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Xác Nhận Mật Khẩu</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password-confirmation">
                </div>


                <div class="form-group">
                    <label for="">Nhóm quyền</label>
                    <select class="form-control" name="role_id" id="role_id">
                        <option>Chọn quyền</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" name="btn-add" value="cap-nhat" class="btn btn-primary">Cập Nhật</button>
                
            </form></div>
        </div>
    </div>
</div>
@endsection