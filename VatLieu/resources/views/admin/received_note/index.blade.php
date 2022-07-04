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
            <h5 class="m-0 ">Danh sách phiếu nhập</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search" value="{{request()->input('keyword')}}" name="keyword" placeholder="Nhập ID">
                    <input type="submit" name="btn-search" value="Tìm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <a href="{{route('admin.received-notes.create')}}" class="btn btn-primary" type="button">Thêm</a> 
        </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Deliver</th>
                        <th scope="col">Người Thêm</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                    <tbody>
                        @if ($received_notes->total()>0)
                            @php
                                $stt=0;   
                            @endphp
                            @foreach($received_notes as $received_note)
                                @php
                                    $stt++;
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td scope="row">{{ $stt }}</td>
                                    <td><a href="#">{{ $received_note->received_notesid }}</a></td>
                                    <td>{{ $received_note->deliver }}</td>
                                    <td>{{ $received_note->user->name }}</td>
                                    <td>{{ $received_note->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
            {{ $received_notes->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
