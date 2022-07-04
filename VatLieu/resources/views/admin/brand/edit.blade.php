@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Sửa thương hiệu
        </div>
        <div class="card-body">
            <form action="{{ url('admin/brand/update'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Tên thương hiệu</label>
                            <input class="form-control" type="text" onkeyup="ChangeToSlug()" name="name" id="slug" value="{{ $brand->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control" type="text" name="slug" id="convert_slug" value="{{ $brand->slug }}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="img">Ảnh</label>
                            @if ($brand->img)
                                <img src="{{ asset('storage/uploads/brandimg/'.$brand->img) }}" alt="" style="width: 200px">
                            @endif
                            <input class="form-control" type="file" name="img" id="img">
                            @error('img')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="description">Mô tả </label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" >{{ $brand->description }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

@endsection