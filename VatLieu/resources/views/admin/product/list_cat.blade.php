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
            <h5 class="m-0 ">Danh sách danh mục</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search" value="{{request()->input('keyword')}}" name="keyword" placeholder="Nhập tên danh mục">
                    <input type="submit" name="btn-search" value="Tìm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ url('/admin/cat/create') }}" class="btn btn-primary" type="button">Thêm danh mục</a>
        </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>


                <tbody>
                    @if ($categories->total()>0)
                        @php
                            $stt=0;   
                        @endphp
                        @foreach($categories as $category)
                            @php
                                $stt++;
                            @endphp
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row">{{ $stt }}</td>
                                <td><a href="#">{{ $category->name }}</a></td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="{{ url('admin/cat/edit/'.$category->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('admin/cat/destroy/'.$category->id) }}" onclick="return confirm('Xác nhận xóa?')"  class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
        {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection