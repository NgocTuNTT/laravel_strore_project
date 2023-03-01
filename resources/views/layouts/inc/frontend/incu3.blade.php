
<div class="sidebar sidebar-shop">
    <div class="widget widget-clean">
        <label>Filters:</label>
        <!-- <a href="{{url('/danh-muc')}}" class="sidebar-filter-clear">Clean All</a> -->
        <a href="{{url('/danh-muc')}}" class="" style="color:#39f">Clean All</a>
    </div>

    <div class="widget widget-collapsible">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                Danh Mục
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-1">
            <div class="widget-body">
                <div class="filter-items filter-items-count">
                    <div class="filter-item">

                        <a class="" href="{{url('/danh-muc/')}}">
                            <div class="custom-control custom-checkbox">
                                <input {{Request::is('danh-muc') ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="">
                                <label class="custom-control-label" for="">Tất cả</label>
                            </div><!-- End .custom-checkbox -->
                        </a>
                        <span class="item-count">{{$products1->total()}}</span>
                    </div><!-- End .filter-item -->
                    @foreach($category as $cate)
                    <div class="filter-item">

                        <a class="" href="{{url('/danh-muc/'.$cate->slug)}}">
                            <div class="custom-control custom-checkbox">
                                <input {{Request::is('danh-muc/'.$cate->slug) ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="{{$cate->id}}">
                                <label class="custom-control-label" for="">{{$cate->name}}</label>
                            </div><!-- End .custom-checkbox -->
                        </a>
                        <span class="item-count">{{$cate->products()->count()}}</span>
                    </div><!-- End .filter-item -->
                    @endforeach

                </div><!-- End .filter-items -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->

    <div class="widget widget-collapsible">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                Size
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-2">
            <div class="widget-body">
                <div class="filter-items">
                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-6">
                            <label class="custom-control-label" for="size-6">XXL</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->
                </div><!-- End .filter-items -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->

    <div class="widget widget-collapsible">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                Colour
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-3">
            <div class="widget-body">
                <div class="filter-colors">
                    <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                    <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                    <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                </div><!-- End .filter-colors -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->

    <div class="widget widget-collapsible">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                Brand
            </a>
        </h3><!-- End .widget-title -->

        <div class="collapse show" id="widget-4">
            <div class="widget-body">
                <div class="filter-items">
                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-1">
                            <label class="custom-control-label" for="brand-1">Next</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-2">
                            <label class="custom-control-label" for="brand-2">River Island</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-3">
                            <label class="custom-control-label" for="brand-3">Geox</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-4">
                            <label class="custom-control-label" for="brand-4">New Balance</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-5">
                            <label class="custom-control-label" for="brand-5">UGG</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-6">
                            <label class="custom-control-label" for="brand-6">F&F</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                    <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-7">
                            <label class="custom-control-label" for="brand-7">Nike</label>
                        </div><!-- End .custom-checkbox -->
                    </div><!-- End .filter-item -->

                </div><!-- End .filter-items -->
            </div><!-- End .widget-body -->
        </div><!-- End .collapse -->
    </div><!-- End .widget -->


</div>
