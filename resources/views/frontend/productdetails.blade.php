@extends('layouts.frontendapp')

@section('frontend_content')



    <!-- Page Info -->
    <div class="page-info-section page-info">
        <div class="container">
            <div class="site-breadcrumb">
                <a href="{{url('/')}}">Home</a> /
                <a href="">{{$single_product_info-> product_name}}</a>
            </div>
            <img src="img/page-info-art.png" alt="" class="page-info-art">
        </div>
    </div>
    <!-- Page Info end -->


    <!-- Page -->
    <div class="page-area product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <figure>
                        <img class="product-big-img" src="{{asset('uploads/product_photo')}}/{{$single_product_info->product_image}}" alt="">
                    </figure>
                    <div class="product-thumbs">
                        <div class="product-thumbs-track">
                            <div class="pt" data-imgbigurl="frontend_assets/img/product/1.jpg"><img src="frontend_assets/img/product/thumb-1.jpg" alt=""></div>
                            <div class="pt" data-imgbigurl="frontend_assets/img/product/2.jpg"><img src="frontend_assets/img/product/thumb-2.jpg" alt=""></div>
                            <div class="pt" data-imgbigurl="frontend_assets/img/product/3.jpg"><img src="frontend_assets/img/product/thumb-3.jpg" alt=""></div>
                            <div class="pt" data-imgbigurl="img/product/4.jpg"><img src="img/product/thumb-4.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2>{{$single_product_info-> product_name}}</h2>
                        <h6> Category Name :

                        {{$single_product_info->relationtocategory->category_name ?? null}}</h6><br>

                        <div class="pc-meta">
                            <h4 class="price">${{$single_product_info-> product_price}}</h4>
                            <div class="review">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star is-fade"></i>
                                </div>
                                <span>(2 reviews)</span>
                            </div>
                        </div>
                        <p>
                            {{$single_product_info->product_discreption}}
                        </p>

                    @if($single_product_info->product_quantity > 0)
                        <a href="{{url('add/to/cart')}}/{{$single_product_info->id}}" class="site-btn btn-line">ADD TO CART</a>
                      @else
                        <div class="alert alert-danger">
                          Product Not Available

                        </div>
                    @endif

                    </div>
                </div>
            </div>
            <div class="product-details">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <ul class="nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- single tab content -->
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center rp-title">
                <h5>Related products</h5>
            </div>
            <div class="row">

              @forelse($related_products as $related_product)

                <div class="col-lg-3">
                    <div class="product-item">
                        <figure>
                            <img src="{{asset('uploads/product_photo')}}/{{$related_product->product_image}}" alt="">
                            <div class="pi-meta">
                                <div class="pi-m-left">
                                    <img src="{{asset('frontend_assets/img/icons/eye.png')}}" alt="">
                                    <p>quick view</p>
                                </div>
                                <div class="pi-m-right">
                                    <img src="{{asset('frontend_assets/img/icons/heart.png')}}" alt="">
                                    <p>save</p>
                                </div>
                            </div>
                        </figure>

                        <div class="product-info">
                            <h6>{{$related_product-> product_name}}</h6>
                            <p>{{$related_product-> product_discreption}}</p>
                            <a href="{{url('product/details')}}/{{$related_product -> id}}}}" class="site-btn btn-line">ADD TO CART</a>
                        </div>



                    </div>
                </div>

              @empty
                <div style="text-align:center;"> No Related Product </div>
              @endforelse




            </div>
        </div>
    </div>
    <!-- Page end -->


@endsection
