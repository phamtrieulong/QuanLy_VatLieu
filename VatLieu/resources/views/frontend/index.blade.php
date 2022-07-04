@extends('layouts.front')
@section('title')
    VATLIEUSHOP
@endsection

@section('content')    

<!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="caption">
                <h2>Giới thiệu</h2>
                <div class="line-dec"></div>
                <p>Công ty TNHH Vật Liệu Xây Dựng .... là công ty chuyên cung cấp Vật liệu Xây dựng và Vật liệu Trang trí Nội - Ngoại thất uy tín chuyên nghiệp hàng đầu tại khu vực Đà Nẵng, Hội An, Tam Kỳ, Quảng Nam, Quảng Ngãi, Quy Nhơn và các tỉnh Miền Trung, Tây Nguyên... 
                <br><br></p>
                <div class="main-button">
                  <a href="#">Order Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner Ends Here -->
  
      <!-- Featured Starts Here -->
      <div class="featured-items">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h1>Sản Phẩm Hot</h1>
              </div>
            </div>
            <div class="col-md-12">
              <div class="owl-carousel owl-theme">
                @foreach ($products as $product)
                  <div class="featured-item">
                    <a href="single-product.html">          
                      <img src="{{ asset('storage/uploads/products/'.$product->image) }}" alt="Item 1">
                      <h4>{{ $product->name }}</h4>
                      <h6>{{ $product->selling_price }}</h6> 
                      <a href="{{ route('cart.add',$product->id) }}" class="btn btn-outline-danger btn-sm mt-3" class="add-to-cart">Thêm vào giỏ</a>
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Featred Ends Here -->
@endsection