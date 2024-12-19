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
    .div_deg{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;
    }
    .table_deg{
      border: 2px solid black; 
    }
    th{
      background-color: lightblue;
      font-size: 19px;
      font-weight: bold;
      padding: 15px;
      border: 2px solid black;
      text-align: center; 
    }
    td{
      border: 2px solid black; 
      text-align: center;
    }
    input[type = 'search']{
      width: 300px;
      height: 30px;
      margin-left: 30px
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
            <h1 class="m-0">DANH SÁCH SẢN PHẨM</h1>
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
        <form action="{{url('product_search')}}" method="get">
          @csrf
          <input type="search" name="search" placeholder="Tìm kiếm">
          <input type="submit" class="btn btn-secondary" value="Search">
        </form>
        <div class="div_deg">
          <table class="table_deg">
            <tr>
              <th>Tên sản phẩm</th>
              <th>Mô tả</th>
              <th>Loại sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Số lượng</th>
              <th>Hình ảnh</th>
              <th>Cập nhật</th>
              <th>Xóa</th>
            </tr>
            @foreach ($product as $products)
              <tr>
                <td>{{$products->title}}</td>
                <td>{!! Str::limit($products->description, 50) !!}</td>
                <td>{{$products->category}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
                <td>
                  <img height="150" width="150" src="products/{{$products->image}}">
                </td>
                <td>
                  <a class="btn btn-success" 
                  href="{{ url('edit_product',$products->id) }}">Cập nhật</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" 
                  href="{{url('delete_product',$products->id)}}">Xóa</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <!-- Số trang -->
        <div class="div_deg">
          {{$product->onEachSide(1)->links()}}
        </div>
      </div>
    </div>
    <!-- /.content-header -->
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>"></script>

<script type="text/javascript">
  function confirmation(ev){
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
      title:"Bạn có chắc muốn xóa sản phẩm này?",
      text:"Việc xóa sản phẩm này sẽ là vĩnh viễn.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willCancel)=>{
      if(willCancel){
        window.location.href = urlToRedirect;
      }
    });
  }
</script>
</body>
</html>
