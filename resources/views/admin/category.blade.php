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
        width: 500px;
        height: 40px;
    }
    .div_deg{
        display: contents;
        justify-content: center;
        align-self: center;
        /* margin: 30px; */
    }
    .table-deg{
      text-align: center;
      margin: auto;
      border: 2px solid black;
      margin-top: 50px;
      width: 600px;
    }
    th{
      background-color: lightblue;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
      color: black;
    }
    td{
      color: lightpink;
      padding: 10px;
      border: 1px solid black;
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
      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @include('admin.menu')
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">TẤT CẢ DANH MỤC</h1>
          </div>
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
        <div class="div_deg">
          <p>Thêm danh mục</p>
          <form action="{{ url('add_category') }}" method="POST">
              @csrf
              <div>
                  <input type="text" name="category" placeholder="Tên danh mục">
                  <input class="btn btn-primary" type="submit" value="Thêm danh mục">
              </div>
          </form>
          

        </div>

         <!-- Xóa danh mục -->
        <div>
          <table class="table-deg">
            <tr>
              <th>Danh mục</th>
              <th>Chức năng</th>
            </tr>
            @foreach ($data as $data)
            <tr>
              <td>{{$data->category_name}}</td>
              <td>
                <a class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Xóa</a>
              </td>
            </tr>
            @endforeach
            
            
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 <a href="">Trần Thị Minh Anh</a>.</strong>
    All rights reserved.
  </footer>
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
