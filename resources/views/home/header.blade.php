<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span>IVY SHOP</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> <!-- Đổi từ span rỗng sang biểu tượng navbar-toggler -->
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.html">Mua sắm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="why.html">Giới thiệu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="testimonial.html">Testimonial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Liên hệ</a>
        </li>
        <div class="user_option">
          @if (Route::has('login'))
            @auth
              <div class="user_option">
                <a href="cart.html">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
                <form class="form-inline" action="/search" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="query">
                    <button class="btn nav_search-btn" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </div>
                </form>
              </div>
              <li class="nav-item" style="padding-left: 20px">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input class="btn btn-success" type="submit" value="Đăng xuất">
              </form>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{url('/login')}}">Đăng nhập</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/register')}}">Đăng ký</a>
              </li>
            
            @endauth
          @endif
        </div>
      </ul>
    </div>
  </nav>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</header>
