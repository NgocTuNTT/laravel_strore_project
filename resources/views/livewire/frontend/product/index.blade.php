<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">

                    @include('layouts.inc.frontend.toolbox')

                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content">
                        @forelse($products as $pro)

                        <div class="col-6 col-md-4 col-lg-4">
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

                                        <a wire:click="addToWishList({{$pro->id}})" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
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





                                        {{ number_format($pro->selling_price) }}₫
                                        {!! ($pro->selling_price < $pro->original_price || $pro->selling_price == '') ? '<span class="product-price12">' . number_format($pro->original_price) . '₫</span>' : '' !!}

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
                        <div class="text-center"><span>không có sản phẩm</span></div>

                        @endforelse

                    </div><!-- End .row -->
                </div><!-- End .products -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">

                        {{$products->links()}}


                    </ul>
                </nav>
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">

                @include('layouts.inc.frontend.incu3')


            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
