@extends('layouts.admin')
@section('content')
    
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            {{-- @php
                dd(request()->session()->all());   
            @endphp --}}
            <form action="{{ url('admin/product/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input class="form-control" type="text" name="name" id="slug" onkeyup="ChangeToSlug()" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control" type="text" name="slug" id="convert_slug" value="{{ old('slug') }}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input class="form-control" type="text" name="sku" id="sku" value="{{ old('sku') }}">
                        @error('sku')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input class="form-control" type="text" name="price" id="price" value="{{ old('price') }}">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Sale</label>
                        <input class="form-control" type="text" name="selling_price" id="selling_price" value="{{ old('selling_price') }}">
                        @error('selling_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input class="form-control" type="file" name="image" id="image" value="{{ old('image') }}">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Mô tả sản phẩm</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input class="form-control" type="text" name="quantity" id="quantity" value="{{ old('quantity') }}">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="form-group">
                        <label for="status">Tình trạng</label>
                        <input class="form-control" type="text" name="status" id="status" value="{{ old('status') }}">
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
    
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control" name="category_id" id="category">
                            <option value="0">Chọn danh mục</option>
                            @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}">-- {{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nhãn hiệu</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="0">Chọn nhãn hiệu</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">-- {{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    
                



                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

@endsection