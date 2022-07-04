<!-- Navigation -->



<nav class="navbar navbar-expand-lg bg-light" >
  <div class="container-fluid" style="display: initial">
    <ul class="nav justify-content-center">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="width: max-content" href="{{ route('products') }}">Sản Phẩm</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('categories') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Danh mục
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach ($categories as $category)
              <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Thương hiệu
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach ($brands as $brand)
              <li><a class="dropdown-item" href="#">{{ $brand->name }}</a></li>
          @endforeach
        </ul>
      </li>
    
      <form class="d-flex" role="search">
        <input class="form-control me-2" style="width: 250px" type="search" placeholder="Tên sản phẩm" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm</button>
      </form>
      
      <li class="nav-item">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" style="width: 120px" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                </li>
            @endif
            @else
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi {{ Auth::user()->last_name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Đăng xuất') }}
                  </a>
    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form></li>
              </ul>
            </li>
            <li class="nav-item" style="width: max-content">
              <a class="nav-link" href="{{ url('/cart') }}">Giỏ hàng</a>
            </li>  
            @endguest
      </li>
    </ul>
  </div>
</nav>



