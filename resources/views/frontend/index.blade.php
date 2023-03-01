@extends('layouts.app')
@section('content')
@section('title','Home')

<main class="main">
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false,
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            @foreach($slide as $sli)
            <div class="intro-slide" style="background-image: url({{$sli->image}});">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <!-- <h3 class="intro-subtitle text-third">Deals and Promotions</h3>
                            <h1 class="intro-title">Beats by</h1>
                            <h1 class="intro-title">Dre Studio 3</h1>

                            <div class="intro-price">
                                <sup class="intro-old-price">$349,95</sup>
                                <span class="text-third">
                                    $279<sup>.99</sup>
                                </span>
                            </div>

                            <a href="category.html" class="btn btn-primary btn-round">
                                <span>Shop More</span>
                                <i class="icon-long-arrow-right"></i>
                            </a> -->
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            @endforeach

        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->



    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                    <img src="frontend/assets/images/demos/demo-4/colorful-fashion-banner-template-memphis-style_1361-1301.avif" alt="Banner">
                    </a>

                    <!-- <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Smart Offer</a></h4>
                        <h3 class="banner-title"><a href="#">Save $150 <strong>on Samsung <br>Galaxy Note9</strong></a></h3>
                        <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div><!-- End .col-md-4 -->

            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">



                        <img src="frontend/assets/images/demos/demo-4/modern-sale-banner-template-with-fluid-shapes_1361-1389.avif" alt="Banner">
 </a>

                    <!-- <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Time Deals</a></h4>
                        <h3 class="banner-title"><a href="#"><strong>Bose SoundSport</strong> <br>Time Deal -30%</a></h3>
                        <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div><!-- End .col-md-4 -->

            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="frontend/assets/images/demos/demo-4/sale-banner-with-product-description_1361-1333.avif" alt="Banner">
                    </a>
<!--
                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Clearance</a></h4>
                        <h3 class="banner-title"><a href="#"><strong>GoPro - Fusion 360</strong> <br>Save $70</a></h3>
                        <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-5 -->

    <div class="container new-arrivals">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">SẢN PHẨM MỚI</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#cssssss" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                    </li>
                    @foreach($category as $cate)

                    <li class="nav-item">
                        <a class="nav-link " id="new-all-link" data-toggle="tab" href="#c{{$cate->id}}" role="tab" aria-controls="new-all-tab" aria-selected="true">{{$cate->name}}</a>
                    </li>

                    @endforeach
                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->
        <div class="tab-content tab-content-carousel just-action-icons-sm">

            <div class=" tab-pane p-0 fade show active" id="cssssss" role="tabpanel" aria-labelledby="new-all-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true,
                                "dot s": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>


                    @forelse($products1 as $pro)

                    <div class="product product-7 text-left ">
                        <figure class="product-media">
                            <!-- <span class="product-label label-top">Top</span> -->
                            <a href="{{url('/danh-muc/'.$pro->category->slug.'/'.$pro->slug)}}">

                                @if($pro->productImages->count() >0)

                                <img src="{{asset($pro->productImages[0]->image)}}" alt="{{$pro->name}}" class="product-image">
                                @if($pro->productImages->count() >1)

                                <img src="{{asset($pro->productImages[1]->image)}}" alt="Product image" class="product-image-hover">
                                @endif

                                @endif


                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span style="display: block;">add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{$pro->category->name}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{$pro->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                @if($pro->selling_price < $pro->original_price || $pro->selling_price == '')

                                    {{ number_format($pro->selling_price) }}₫
                                    <span class="product-price12"> {{ number_format($pro->original_price) }}₫
                                    </span>
                                    @else

                                    {{ number_format($pro->selling_price) }}₫

                                    @endif
                            </div>

                            <div class="product-nav product-nav-thumbs">


                                @foreach($pro->productImages as $image1)
                                <a href="{{url('/danh-muc/'.$pro->category->slug.'/'.$pro->slug)}}" class="">
                                    <img src="{{asset($image1->image)}}" alt="{{$pro->name}}" title="{{$pro->name}}" class="rounded me-3">
                                </a>
                                @endforeach
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->



                    </div><!-- End .product -->
                    @empty

                    <div>không có sản phẩm</div>

                    @endforelse

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            @foreach($category as $cate)
            <div class=" tab-pane p-0 fade show " id="c{{$cate->id}}" role="tabpanel" aria-labelledby="new-all-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true,
                                "dot s": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>


                    @forelse($cate->products1 as $pro)

                    <div class="product product-7 text-left ">
                        <figure class="product-media">
                            <!-- <span class="product-label label-top">Top</span> -->
                            <a href="{{url('/danh-muc/'.$pro->category->slug.'/'.$pro->slug)}}">

                                @if($pro->productImages->count() >0)

                                <img src="{{asset($pro->productImages[0]->image)}}" alt="{{$pro->name}}" class="product-image">
                                @if($pro->productImages->count() >1)

                                <img src="{{asset($pro->productImages[1]->image)}}" alt="Product image" class="product-image-hover">
                                @endif

                                @endif


                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span style="display: block;">add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{$pro->category->name}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{$pro->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                @if($pro->original_price >= $pro->selling_price)
                                {{ number_format($pro->selling_price) }}₫
                                @else
                                {{ number_format($pro->selling_price) }}₫
                                <span class="product-price12"> {{ number_format($pro->selling_price) }}₫
                                </span>
                                @endif
                            </div>

                            <div class="product-nav product-nav-thumbs">


                                @foreach($pro->productImages as $image1)
                                <a href="{{url('/danh-muc/'.$pro->category->slug.'/'.$pro->slug)}}" class="">
                                    <img src="{{asset($image1->image)}}" alt="{{$pro->name}}" title="{{$pro->name}}" class="rounded me-3">
                                </a>
                                @endforeach
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->



                    </div><!-- End .product -->
                    @empty

                    <div>không có sản phẩm</div>

                    @endforelse

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            @endforeach
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- End .mb-6 -->



    <div class="container">

        <div class="row">
            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('frontend/assets/images/demos/demo-4/white-sneakers-blue-copy-space-top-view_102375-159.jpg');">
                    <div class="deal-top">
                        <h2>Deal of the Day.</h2>
                        <h4>Limited quantities. </h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Home Smart Speaker with Google Assistant</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">$129.00</span>
                            <span class="old-price">Was $150.99</span>
                        </div><!-- End .product-price -->

                        <a href="product.html" class="btn btn-link"><span>Shop Now</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('frontend/assets/images/demos/demo-4/deal/bg-2.jpg');">
                    <div class="deal-top">
                        <h2>Your Exclusive Offers.</h2>
                        <h4>Sign in to see amazing deals.</h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Certified Wireless Charging Pad for iPhone / Android</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">$29.99</span>
                        </div><!-- End .product-price -->

                        <a href="login.html" class="btn btn-link"><span>Sign In and Save money</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

    </div><!-- End .container -->




    <div class="mb-5"></div><!-- End .mb-5 -->

    <div class="container for-you">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Khuyến nghị cho bạn</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="#" class="title-link">Xem tất cả <i class="icon-long-arrow-right"></i></a>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="products">
            <div class="row justify-content-center">

                @forelse($product as $pro)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-7 text-left">
                        <figure class="product-media">
                            <!-- <span class="product-label label-top">Top</span> -->
                            <a href="{{url('/danh-muc/'.$pro->category->slug.'/'.$pro->slug)}}">

                                @if($pro->productImages->count() >0)

                                <img src="{{asset($pro->productImages[0]->image)}}" alt="{{$pro->name}}" class="product-image">
                                @if($pro->productImages->count() >1)

                                <img src="{{asset($pro->productImages[1]->image)}}" alt="Product image" class="product-image-hover">
                                @endif

                                @endif


                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{$pro->category->name}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{$pro->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">



                            @if($pro->selling_price < $pro->original_price || $pro->selling_price == '')

{{ number_format($pro->selling_price) }}₫
<span class="product-price12"> {{ number_format($pro->original_price) }}₫
</span>
@else

{{ number_format($pro->selling_price) }}₫

@endif
                            </div>
                            <div class="product-nav product-nav-thumbs">


                                @foreach($pro->productImages as $image1)
                                <a href="{{url('/danh-muc/'.$pro->category->slug.'/'.$pro->slug)}}" class="">
                                    <img src="{{asset($image1->image)}}" alt="{{$pro->name}}" title="{{$pro->name}}" class="rounded me-3">
                                </a>
                                @endforeach
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
                @empty
                <div>không có sản phẩm</div>
                @endforelse
            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <hr class="mb-0">
    </div><!-- End .container -->

    <div class="icon-boxes-container bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Miễn phí vận chuyển</h3><!-- End .icon-box-title -->
                            <p>Đơn hàng 100.000đ trở lên</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Trả lại miễn phí
</h3><!-- End .icon-box-title -->
                            <p>Trong vòng 30 ngày

</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Giảm 20% cho 1 mặt hàng
</h3><!-- End .icon-box-title -->
                            <p>khi bạn đăng ký

    </p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Chúng tôi hỗ trợ
</h3><!-- End .icon-box-title -->
                            <p>24/7 dịch vụ tuyệt vời

</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->
</main>


@endsection
