@extends('layouts.admin')

@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">            
            <div class="form-action form-inline py-3">
                <input type="submit" name="btn-search" value="Thêm đơn" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Tổng giá trị</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td>
                            <input type="checkbox">
                        </td>
                        {{-- <td>1</td>
                        <td><a href="#">1212</a></td>
                        <td>
                            Phan Văn Cương <br>
                            0988859692
                        </td>
                        <td>7.790.000₫</td>
                        <td><span class="badge badge-warning">Đang xử lý</span></td>
                        <td>26:06:2020 14:00</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td> --}} 
                    </tr>
                    

                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection