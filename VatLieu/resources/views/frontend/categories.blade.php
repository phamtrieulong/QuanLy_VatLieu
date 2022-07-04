@extends('layouts.front')

@section('content')

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Categories</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Categories</button>
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
        @foreach ($categories as $category) 
        <div class="col">
          <div class="p-3 border bg-light">
            
            <a href="single-product.html">
              <div class="featured-item">
                <img src="{{ asset('storage/uploads/categories/'.$category->image) }}" alt="">
                <h4>{{ $category->name }}</h4>
              </div>
            </a>
          </div>
        </div>  
        @endforeach
      </div>
      </div>

    {{-- {{$products->links() }} --}}
    <!-- Featred Page Ends Here -->


    
@endsection