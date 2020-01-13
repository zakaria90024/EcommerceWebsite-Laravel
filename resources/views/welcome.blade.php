@extends('layouts.frontendapp')

@section('frontend_content')



    <!-- Hero section -->
    <section class="hero-section set-bg" data-setbg="img/bg.jpg">
        <div class="hero-slider owl-carousel">
            <div class="hs-item">
                <div class="hs-left"><img src="{{asset('frontend_assets/img/slider-img.png')}}" alt=""></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price">from $19.90</div>
                        <h2><span>2018</span> <br>summer collection</h2>
                        <a href="" class="site-btn">Shop NOW!</a>
                    </div>
                </div>
            </div>
            <div class="hs-item">
                <div class="hs-left"><img src="{{asset('frontend_assets/img/slider-img.png')}}" alt=""></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price">from $19.90</div>
                        <h2><span>2018</span> <br>summer collection</h2>
                        <a href="" class="site-btn">Shop NOW!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->


    <!-- Intro section -->
    <section class="intro-section spad pb-0">
        <div class="section-title">
            <h2>pemium products</h2>
            <p>We recommend</p>
        </div>

        <div class="intro-slider">
            <ul class="slidee">

                @foreach($products as $product)

                    <li>
                        <div class="intro-item">
                            <figure>
                                <a href="{{url('product/details')}}/{{$product-> id}}" alt="#">
                                    <img src="{{asset('uploads/product_photo')}}/{{$product->product_image}}" alt="#">
                                </a>
                            </figure>
                            <div class="product-info">
                                <h5>{{$product->product_name}}</h5>
                                <p>${{$product->product_price}}</p>
                                <a href="{{url('product/details')}}/{{$product->id}}" class="site-btn btn-line">ADD TO CART</a>
                            </div>
                        </div>
                    </li>

                @endforeach
            </ul>
        </div>

        <div class="container">
  			<div class="scrollbar">
  				<div class="handle">
  					<div class="mousearea"></div>
  				</div>
  			</div>
  		</div>
    </section>
    <!-- Intro section end -->


    <!--
    <div class="featured-section spad">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="featured-item">
                        <img src="{{asset('frontend_assets/img/featured/featured-1.jpg')}}" alt="">
                        <a href="#" class="site-btn">see more</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="featured-item mb-0">
                        <img src="img/featured/featured-2.jpg" alt="">
                        <a href="#" class="site-btn">see more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   Featured section end -->


    <!-- Product section -->
    <section class="product-section spad">
        <div class="container">
            <ul class="product-filter controls">
              <li class="control" data-filter=".all">All</li>
              @foreach ($categories as $category)
                    <li class="control" data-filter=".filter{{$category->id}}">{{$category->category_name}}</li>
              @endforeach

            </ul>
            <div class="row" id="product-filter">
                @foreach($products as $product)
                <div class="mix col-lg-3 col-md-6 all filter{{$product->category_id}}">
                    <div class="product-item">
                        <figure>
                            <img src="{{asset('uploads/product_photo')}}/{{$product->product_image}}" alt="">
                            <div class="pi-meta">
                                <div class="pi-m-left">
                                    <img src="img/icons/eye.png" alt="">
                                    <p>quick view</p>
                                </div>
                                <div class="pi-m-right">
                                    <img src="img/icons/heart.png" alt="">
                                    <p>save</p>
                                </div>
                            </div>
                        </figure>
                        <div class="product-info">
                            <h6>{{$product->product_name}}</h6>
                            <p>{{$product->product_price}}</p>
                            <a href="{{url('product/details')}}/{{$product->id}}" class="site-btn btn-line">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- Product section end -->





    <!-- Footer top section -->
    <section class="footer-top-section home-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-sm-12">
                    <div class="footer-widget about-widget">
                        <img src="img/logo.png" class="footer-logo" alt="">
                        <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                        <div class="cards">
                            <img src="img/cards/5.png" alt="">
                            <img src="img/cards/4.png" alt="">
                            <img src="img/cards/3.png" alt="">
                            <img src="img/cards/2.png" alt="">
                            <img src="img/cards/1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">usefull Links</h6>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bloggers</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Sitemap</h6>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bloggers</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Shipping & returns</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Track Orders</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Contact</h6>
                        <div class="text-box">
                            <p>Your Company Ltd </p>
                            <p>1481 Creekside Lane  Avila Beach, CA 93424, </p>
                            <p>+53 345 7953 32453</p>
                            <p>office@youremail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection
