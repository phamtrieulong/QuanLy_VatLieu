@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm User
        </div>
        <div class="card-body">
            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                <div class="form-group">
                    <label for="first_name">Họ</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Tên</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Ngày sinh</label>
                    <input class="form-control" type="date" name="dob" id="dob" value="{{ old('dob') }}">
                    @error('dob')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input class="form-control" type="file" name="avatar" id="avatar" value="{{ old('avatar') }}">
                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
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

                <button type="submit" name="btn-add" value="them-moi" class="btn btn-primary">Thêm mới</button>
                
            </form></div>
        </div>
    </div>
</div>
@endsection

