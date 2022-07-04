@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm thương hiệu
        </div>
        <div class="card-body">
            <form action="{{ url('admin/brand/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Tên thương hiệu</label>
                            <input class="form-control" type="text" onkeyup="ChangeToSlug()" name="name" id="slug" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control" type="text" name="slug" id="convert_slug" value="{{ old('slug') }}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="img">Ảnh</label>
                            <input class="form-control" type="file" name="img" id="img">
                            @error('img')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="description">Mô tả </label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" >{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

@endsection