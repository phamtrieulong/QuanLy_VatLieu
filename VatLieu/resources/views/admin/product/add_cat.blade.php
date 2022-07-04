@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm Danh Mục
        </div>
        <div class="card-body">
            <form action="{{ url('admin/cat/store') }}" method="POST">
                @csrf
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" id="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" value="{{ old('description') }}"></textarea>
                        
                    </div>  

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

@endsection