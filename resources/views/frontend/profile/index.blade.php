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
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist" style="    box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);padding: 25px;">
                            <li class="nav-item">
                                <a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="false">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">bảng điều khiển</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">đơn đặt hàng</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Tải xuống</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">địa chỉ</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Chi tiết tài khoản</font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Đăng xuất</font>
                                    </font>
                                </a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content" style="    box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);padding: 25px;">
                            <div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Xin chào </font>
                                    </font><span class="font-weight-normal text-dark">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Người dùng</font>
                                        </font>
                                    </span>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> (không phải </font>
                                    </font><span class="font-weight-normal text-dark">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Người dùng</font>
                                        </font>
                                    </span>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> ? </font>
                                    </font><a href="#">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Đăng xuất</font>
                                        </font>
                                    </a>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> )
                                        </font>
                                    </font><br>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Từ bảng điều khiển tài khoản của bạn, bạn có thể xem </font>
                                    </font><a href="#tab-orders" class="tab-trigger-link link-underline">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">các đơn đặt hàng gần đây</font>
                                        </font>
                                    </a>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> của mình , quản lý </font>
                                    </font><a href="#tab-address" class="tab-trigger-link">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">địa chỉ giao hàng và thanh toán</font>
                                        </font>
                                    </a>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> cũng như </font>
                                    </font><a href="#tab-account" class="tab-trigger-link">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">chỉnh sửa mật khẩu và chi tiết tài khoản của bạn</font>
                                        </font>
                                    </a>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"> .</font>
                                    </font>
                                </p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade active show" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">



                                <div class="table-responsive">
                                    <table class="table table-borderless table-centered table-hover dt-responsive nowrap w-100 dataTable no-footer">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Tracking</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Thanh toán</th>
                                                <th class="text-center" style="">Ngày đặt</th>
                                                <th class="text-center" style="max-width: 70px;">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $itemorder)
                                            <tr>
                                                <td class="text-center">
                                                    {{$itemorder->id}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemorder->tracking_no}}
                                                </td>
                                                <td class="text-center">
                                                    {{$itemorder->status_message}}
                                                </td>
                                                <td class="text-center">

                                                    @if ($itemorder->payment_mode == 'Paypal')
                                                    <img src="{{asset('frontend/assets/images/paypal.png')}}" style="max-height: 17px;display: inline;" height="25" alt="paypal-img">
                                                    @elseif ($itemorder->payment_mode == 'Tiền mặt')
                                                    <img src="{{asset('frontend/assets/images/cod.png')}}" style="max-height: 17px;display: inline;" height="25" alt="paypal-img">
                                                    @else
                                                    {{ $itemorder->payment_mode }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                {{ \Carbon\Carbon::parse($itemorder->created_at)->locale('vi')->diffForHumans() }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('profile1.order',$itemorder->id)}}">xem</a>
                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                {{ $order->links() }}

                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                <p>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Chưa có bản tải xuống nào.</font>
                                    </font>
                                </p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">ĐI MUA SẮM</font>
                                        </font>
                                    </span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Theo mặc định, các địa chỉ sau sẽ được sử dụng trên trang thanh toán.</font>
                                    </font>
                                </p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Địa chỉ thanh toán</font>
                                                    </font>
                                                </h3><!-- End .card-title -->

                                                <p>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Tên người dùng </font>
                                                    </font><br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            Người dùng Công ty </font>
                                                    </font><br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            John str </font>
                                                    </font><br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            New York, NY 10001 </font>
                                                    </font><br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            1-234-987-6543 </font>
                                                    </font><br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            yourmail@mail.com </font>
                                                    </font><br>
                                                    <a href="#">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Chỉnh sửa</font>
                                                        </font><i class="icon-edit"></i>
                                                    </a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Địa chỉ giao hàng</font>
                                                    </font>
                                                </h3><!-- End .card-title -->

                                                <p>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Bạn chưa thiết lập loại địa chỉ này. </font>
                                                    </font><br>
                                                    <a href="#">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Biên tập</font>
                                                        </font><i class="icon-edit"></i>
                                                    </a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Họ *</font>
                                                </font>
                                            </label>
                                            <input type="text" class="form-control" required="">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Họ *</font>
                                                </font>
                                            </label>
                                            <input type="text" class="form-control" required="">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Tên hiển thị *</font>
                                        </font>
                                    </label>
                                    <input type="text" class="form-control" required="">
                                    <small class="form-text">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Đây sẽ là cách tên của bạn sẽ được hiển thị trong phần tài khoản và trong các bài đánh giá</font>
                                        </font>
                                    </small>

                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Địa chỉ email *</font>
                                        </font>
                                    </label>
                                    <input type="email" class="form-control" required="">

                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Mật khẩu hiện tại (để trống nếu không thay đổi)</font>
                                        </font>
                                    </label>
                                    <input type="password" class="form-control">

                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Mật khẩu mới (để trống nếu không thay đổi)</font>
                                        </font>
                                    </label>
                                    <input type="password" class="form-control">

                                    <label>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Xác nhận mật khẩu mới</font>
                                        </font>
                                    </label>
                                    <input type="password" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">LƯU THAY ĐỔI</font>
                                            </font>
                                        </span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div>
</main><!-- End .main -->


@endsection
