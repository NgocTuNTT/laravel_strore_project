    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @if(session()->has('message'))

                    <div class="alert123 alert-success">
                        {{ session('message') }}
                    </div>


                    @endif
                    @if(session()->has('message1'))

                    <div class="alert1234 alert-success">
                        {{ session('message1') }}
                    </div>


                    @endif
                    <div class="product-details-top">
                        <div class="row " style="">

                            <div class="col-md-5">
                                <div class="product-gallery">
                                    <figure class="product-main-image">
                                        <span class="product-label label-top">Top</span>
                                        @if($products->productImages->count() > 0)
                                        <img id="product-zoom" src="{{ asset($products->productImages->first()->image) }}" alt="product image">
                                        @endif
                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure>
                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        @foreach($products->productImages as $image)
                                        <a class="product-gallery-item" href="#" data-image="{{ asset($image->image) }}">
                                            <img src="{{ asset($image->image) }}" alt="product side">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-7">
                                <div class="product-details product-details-sidebar mt-2">
                                    <h1 class="product-title">{{$products->name}}</h1>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>
                                        </div>
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                    </div>
                                    <div class="product-price">
                                        {{ number_format($products->selling_price) }} VND
                                    </div>
                                    <div class="product-content">
                                        <p>{{$products->small_description}}</p>
                                    </div>
                                    <div class="details-filter-row details-row-size">
                                        <label>Màu:</label>
                                        <div class="">
                                            @if($products->productColors->count() > 0)
                                            @if($products->productColors)
                                            @foreach($products->productColors as $colorItem)
                                            <button wire:click="colorSelected({{$colorItem->id}})" class="mb-0 colorSelectionLabel  product-variation @if($selectedColorId == $colorItem->id) selected @endif" aria-label="{{$colorItem->color->name}}" {{$colorItem->quantity == 0 ? 'disabled' : ''}} aria-disabled="false">
                                                {{$colorItem->color->name}}

                                            </button>


                                            @endforeach
                                            @endif
                                            @else
                                            không màu
                                            @endif

                                        </div><!-- End .product-nav -->
                                    </div><!-- End .details-filter-row -->


                                    <div class="product-details-action">
                                        <div class="details-action-col">
                                            <label for="size">SL:</label>

                                            <div class="input-group">
                                                <span class="btn " wire:click="decrementQuantity" style="min-width: 40px; padding: 0; border: 1px solid rgba(0, 0, 0, .09);cursor: pointer;border-color: #d7d7d7;font-weight: 500;border-right: none;">-</span>
                                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly style="max-width: 60px; text-align: center; border-color: #d7d7d7; border: 1px solid rgba(0, 0, 0, .09);">
                                                <span class="btn " wire:click="incrementQuantity" style="min-width: 40px; padding: 0; border: 1px solid rgba(0, 0, 0, .09);cursor: pointer;border-color: #d7d7d7;font-weight: 500;border-left: none;">+</span>

                                                @if($products->productColors)
                                                @foreach($products->productColors as $colorItem)
                                                @if($selectedColorId == $colorItem->id)
                                                <span style="margin-left: 10px;" class="quantity-label">{{ $colorItem->quantity }} sản phẩm có sẳn</span>
                                                @endif
                                                @endforeach
                                                @endif

                                            </div>


                                        </div><!-- End .details-action-col -->
                                        <div class="details-filter-row details-row-size">
                                                <button class="" type="button" wire:click="addToCart({{$products->id}})" style="height: 45px;padding: 0 20px; background: #edf6ff;display: flex; align-items: center;gap: 5px; color: #39f; border: 1px solid #39f; box-shadow: 0 1px 1px 0 rgb(0 0 0 / 3%);"><i style="font-size: 30px;" class="icon-shopping-cart"></i> Mua hàng</button>


                                        </div><!-- End .details-filter-row -->
                                        <button type="button" wire:click="addToWishList({{$products->id}})" class="" style="border: 0;border-radius: 15px;font-size: 12px;font-weight: 300;padding: 0 10px; color: #fff;background-color: #39f;">
                                            <span wire:loading.remove wire:target="addToWishList({{$products->id}})" class="">Thêm yêu thích <i class="icon-heart-o"></i></span>
                                            <span wire:loading wire:target="addToWishList({{$products->id}})" class="">
                                                <div style="font-size: 11px;    width: 2rem;height: 2rem;" class="spinner-border text-with" role="status"> </div>
                                                Đang thêm <i class="fa fa-spinner fa-pulse"></i>
                                            </span>

                                        </button>
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer details-footer-col">
                                        <div class="product-cat">
                                            <span>Danh mục:</span>
                                            <a href="#">{{$products->category->name}}</a>
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Thông tin thêm</a>
                            </li>


                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">

                                <p>{{$products->description}}</p>

                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    <ul>
                                        <li>Faux suede fabric</li>
                                    </ul>

                                    <h3>Size</h3>
                                    <p>one size</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->


                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-start mb-4">Sản phẩm liên quan ?</h2><!-- End .title text-center -->
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
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
                                                "items":4,
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                        @forelse($products1 as $pro)
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
                                </div>

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
                                    {{ number_format($pro->selling_price) }} VND
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 1 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-thumbs">


                                    @foreach($pro->productImages as $image1)
                                    <a href="#" class="">
                                        <img src="{{asset($image1->image)}}" alt="{{$pro->name}}" title="{{$pro->name}}" class="rounded me-3">
                                    </a>
                                    @endforeach
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @empty
                        <div>không có sản phẩm</div>
                        @endforelse


                    </div>
                </div>


            </div>

        </div>

    </div>
