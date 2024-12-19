<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QUẢN TRỊ VIÊN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/jqvmap/jqvmap.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/css/admin/dist/css/adminlte.min.css') }} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/daterangepicker/daterangepicker.css') }} ">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/summernote/summernote-bs4.min.css') }} ">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <style>
    input[type = 'text']{
        width: 400px;
        height: 40px;
    }
    .div_deg{
        display: contents;
        justify-content: center;
        align-self: center;
        /* margin: 30px; */
 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="display: flex; justify-content: center; align-items: center; width: 100%;">
          <a href="#" class="d-block">CHÀO MỪNG ADMIN <br>Trần Thị Minh Anh</a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @include('admin.menu')
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> <!-- Biểu tượng -->
                            {{ __('Đăng xuất') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            </ol>
        </div>
        </div>

        <h1>Cập nhật sản phẩm</h1>
        <div class="div_deg">
            <form action="{{ url('update_product', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tên sản phẩm -->
                <div class="form-group">
                    <label for="title">Tên sản phẩm</label>
                    <input type="text" name="title" value="{{ $data->title }}" class="form-control" required>
                </div>

                <!-- Mô tả sản phẩm -->
                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $data->description }}</textarea>
                </div>

                <!-- Giá sản phẩm -->
                <div class="form-group">
                    <label for="price">Giá sản phẩm</label>
                    <input type="number" name="price" value="{{ $data->price }}" class="form-control" required>
                </div>

                <!-- Danh mục -->
                <div class="form-group">
                    <label for="category">Danh mục</label>
                    <select name="category">
                      <option value="{{ $data->category }}">{{ $data->category }}</option>
                    </select>
                </div>

                <!-- Số lượng -->
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" value="{{ $data->quantity }}" class="form-control" required>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label for="image">Hình ảnh hiện tại</label><br>
                    @if ($data->image)
                        <img src="{{ asset('/products/' . $data->image) }}" alt="Hình ảnh sản phẩm" style="width: 150px; height: auto;">
                    @else
                        <p>Không có hình ảnh</p>
                    @endif
                    <br><br>
                    <label for="image">Cập nhật hình ảnh</label>
                    <input type="file" name="image" class="form-control-file">
                </div>

                <!-- Nút submit -->
                @csrf
                <input class="btn btn-primary" type="submit" value="Cập nhật sản phẩm">
            </form>
        </div>

      </div>
    </div>
  </div>





  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 <a href="">Trần Thị Minh Anh</a>.</strong>
    All rights reserved.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/css/admin/plugins/jquery/jquery.min.js') }} "></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/css/admin/plugins/jquery-ui/jquery-ui.min.js') }} "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/css/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- ChartJS -->
<script src="{{ asset('/css/admin/plugins/chart.js/Chart.min.js') }} "></script>
<!-- Sparkline -->
<script src="{{ asset('/css/admin/plugins/sparklines/sparkline.js') }} "></script>
<!-- JQVMap -->
<script src="{{ asset('/css/admin/plugins/jqvmap/jquery.vmap.min.js') }} "></script>
<script src="{{ asset('/css/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/css/admin/plugins/jquery-knob/jquery.knob.min.js') }} "></script>
<!-- daterangepicker -->
<script src="{{ asset('/css/admin/plugins/moment/moment.min.js') }} "></script>
<script src="{{ asset('/css/admin/plugins/daterangepicker/daterangepicker.js') }} "></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/css/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }} "></script>
<!-- Summernote -->
<script src="{{ asset('/css/admin/plugins/summernote/summernote-bs4.min.js') }} "></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/css/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('/css/admin/dist/js/adminlte.js') }} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/css/admin/dist/js/demo.js') }} "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/css/admin/dist/js/pages/dashboard.js') }} "></script>
</body>
</html>
