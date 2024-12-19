<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('/css/fontend/images/favicon.png') }} " type="image/x-icon">

  <title>IVY SHOP</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/fontend/css/bootstrap.css') }} " />

  <!-- Custom styles for this template -->
  <link href="{{ asset('/css/fontend/css/style.css') }} " rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('/css/fontend/css/responsive.css') }} " rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('home.product')
  <!-- end shop section -->

  <!-- contact section -->
  @include('home.contact')
  <!-- end contact section -->

  <!-- info section -->
  @include('home.info')
  <!-- end info section -->

  <script src="{{ asset('/css/fontend/js/jquery-3.4.1.min.js') }} "></script>
  <script src="{{ asset('/css/fontend/js/bootstrap.js') }} "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('/css/fontend/js/custom.js') }} "></script>
</body>
</html>