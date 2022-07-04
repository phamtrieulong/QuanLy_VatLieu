@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách User</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search" value="{{request()->input('keyword')}}" name="keyword" placeholder="Nhập tên user">
                    <input type="submit" name="btn-search" value="Tìm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.users.create')}}" class="btn btn-primary" type="button">Thêm user</a>
        </div>
        <div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>

                    @if($users->total()>0)
                        @php
                            $stt=0;
                        @endphp
                        @foreach($users as $user)
                        @php
                            $stt++;
                        @endphp                   
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">{{$stt}}</td>
                            <td>
                                <img src="{{ asset($user->avatar) }}" alt="" width="80px">
                            </td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                @if (Auth::id()!=$user->id)
                                    <a href="{{url('admin/users/destroy/'.$user->id)}}" 
                                        onclick="return confirm('Xác nhận xóa?')" 
                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" 
                                        data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="bg-white">
                                Không Tìm Thấy Bản Ghi
                            </td>
                        </tr>
                    @endif
                       
                </tbody>
            </table>
            {{$users->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
