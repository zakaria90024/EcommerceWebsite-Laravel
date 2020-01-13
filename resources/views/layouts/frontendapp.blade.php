<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>The Plaza - eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="The Plaza eCommerce Template">
    <meta name="keywords" content="plaza, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend_assets/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend_assets/css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend_assets/css/animate.css')}}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section header-normal">
    <div class="container-fluid">
        <!-- logo -->
        <div class="site-logo">
            <img src="{{  asset('frontend_assets/img/logo.png') }}" alt="logo">
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>


        <div class="header-right">
            <a href="{{url('cart')}}" class="card-bag"><img src="{{asset('frontend_assets/img/icons/bag.png')}}" alt=""><span>{{ App\Cart::where('customar_ip', $_SERVER['REMOTE_ADDR'])->sum('product_quantity') }}</span></a>
            <a href="#" class="search"><img src="img/icons/search.png" alt=""></a>
        </div>

        <!-- site menu -->
        <ul class="main-menu">

          @php
            //$menus = App\Category::latest()->take(5)->get();
            $menus = App\Category::where('menu_status', '1')->get();
          @endphp
          <li><a href="{{url('/')}}">Home</a></li>
          @foreach ($menus as $menu)
            <li><a href="{{'category/wise/produdcts'}}/{{$menu->id}}">{{$menu->category_name}}</a></li>

          @endforeach
          <li><a href="{{'contect'}}">Contact</a></li>

        </ul>
    </div>
</header>
<!-- Header section end -->
@yield('frontend_content')





<!-- Footer top section end -->

<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
</footer>
<!-- Footer section end -->


<!--====== Javascripts & Jquery ======-->
<script src="{{asset('frontend_assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/sly.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/main.js')}}"></script>
