@extends('layouts.front')
@section('title')
    VATLIEUSHOP
@endsection

@section('content')

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Products</button>
              <button class="btn btn-primary" data-filter=".new">Newest</button>
              <button class="btn btn-primary" data-filter=".low">Low Price</button>
              <button class="btn btn-primary" data-filter=".high">Hight Price</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
    <div class="container">
      <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
        @foreach ($products as $product) 
        <div class="col">
          <div class="p-3 border bg-light" style="height: 400px">
            <div class="featured-item" style="height: 300px">
            <a href="single-product.html">
                <img src="{{ asset('storage/uploads/products/'.$product->image) }}"  alt="">
                <h4>{{ $product->name }}</h4>
                <h6>{{ $product->selling_price }}</h6>
                <a href="{{ route('cart.add',$product->id) }}" class="btn btn-outline-danger btn-sm mt-3" class="add-to-cart">Thêm vào giỏ</a>
            </a></div>
          </div>
        </div>  
        @endforeach
      </div>
      </div>

    {{-- {{$products->links() }} --}}
    <!-- Featred Page Ends Here -->


    
@endsection