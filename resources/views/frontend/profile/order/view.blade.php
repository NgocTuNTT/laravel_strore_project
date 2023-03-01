@extends('layouts.app')

@section('title',''. Auth::user()->name)


@section('content')

<main class="main">

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Items from Order #12537</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th class="text-center">Số lượng</th>
                                                <th class="text-right">Giá</th>
                                                <th class="text-right">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @php
                                            $totalprice = 0;
                                            @endphp
                                            @foreach($order->OrderItem as $item)
                                            <tr>


                                                <td> <img src="{{asset($item->product->productImages[0]->image)}}" width="74px" alt="contact-img" title="contact-img" class="rounded mr-3 d-inline-block">
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html" class="text-body">{{$item->name}}</a>
                                                        <br>
                                                        <small class="me-2"><b>Size:</b> XL </small>
                                                        <small><b>Màu:</b>@if($item->productColors)
                                                            {{$item->productColors->color->name}}
                                                            @else
                                                            @endif

                                                        </small>
                                                    </p>
                                                </td>
                                                <td class="text-center">{{$item->quantity}}</td>
                                                <td class="text-right">{{ str_replace(',', '.', number_format(($item->price))) }}₫</td>
                                                <td class="text-right">{{ str_replace(',', '.', number_format(($item->price)*($item->quantity) )) }}₫</td>


                                            </tr>


                                            @php
                                            $totalprice += $item->price*$item->quantity;
                                            @endphp
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Order Summary</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Description</th>
                                                <th class="text-right">Price</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($order->payment_mode != "Paypal")
                                            <tr>
                                                <td>Tổng thu :</td>
                                                <td class="text-right">{{ str_replace(',', '.', number_format(($totalprice ))) }}₫</td>
                                            </tr>
                                            <tr>
                                                <td>Giảm giá :</td>
                                                <td class="text-right">-10.000</td>
                                            </tr>
                                            <tr>
                                                <td>Phí vận chuyển :</td>
                                                <td class="text-right"> 30.000₫</td>
                                            </tr>
                                            <tr>
                                                <td>Thuế 5% : </td>
                                                <td class="text-right">{{ str_replace(',', '.', number_format(($totalprice)*0.05)) }}₫</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng cộng :</th>

                                                <th class="text-right">{{ str_replace(',', '.', number_format(($order->payment->amount))) }}₫</th>

                                            </tr>
                                            @else
                                            <tr>
                                                <td>Tổng thu :</td>
                                                <td class="text-right">${{ str_replace(',', '.', number_format(($totalprice )/23000)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Giảm giá :</td>
                                                <td class="text-right">$-{{0.4}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phí vận chuyển :</td>
                                                <td class="text-right">$ {{1.4}}</td>
                                            </tr>
                                            <tr>
                                                <td>Thuế 5% : </td>
                                                <td class="text-right">${{ str_replace(',', '.', number_format(($totalprice)/23000 *0.05)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng cộng :</th>

                                                <th class="text-right">${{ str_replace(',', '.', number_format(($order->payment->amount))) }}</th>

                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">THÔNG TIN VẬN CHUYỂN</h4>


                                <address class="mb-0 font-14 address-lg">
                                    <span title="Phone">Tên:</span> {{$order->name}}<br>
                                    <span title="Phone">Email:</span> {{$order->email}}<br>
                                    <span title="Phone">Địa chỉ:</span> {{$order->address}}<br>
                                    <span title="Phone">Điện thoại:</span> {{$order->phone}}<br>
                                </address>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">THÔNG TIN THANH TOÁN</h4>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <p class="mb-1"><span class="fw-bold me-2">Loại thanh toán:</span> {{$order->payment_mode}}</p>
                                        <p class="mb-1"><span class="fw-bold me-2">Nhà cung cấp:</span> Visa ending in 2851</p>
                                        <p class="mb-1"><span class="fw-bold me-2">Ngày hiệu lực:</span> 02/2020</p>
                                        <p class="mb-0"><span class="fw-bold me-2">CVV:</span> xxx</p>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">THÔNG TIN GIAO HÀNG</h4>

                                <div class="text-center">
                                    <i class="mdi mdi-truck-fast h2 text-muted"></i>
                                    <h5><b>UPS Delivery</b></h5>
                                    <p class="mb-1"><b>ID đơn hàng :</b> xxxx235</p>
                                    <p class="mb-0"><b>Phương thức thanh toán :</b> COD</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div><!-- End .dashboard -->
        </div>
</main><!-- End .main -->


@endsection
