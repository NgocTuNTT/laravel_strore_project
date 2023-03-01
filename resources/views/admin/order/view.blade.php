@extends('layouts.admin')
@section('title','Đơn hàng')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <a href="{{route('order.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
                    </div>
                    <div class="col-sm-6 text-end mt-3">
                        <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Invoice Logo-->


                    <!-- Invoice Detail-->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="float-end ">
                                <p><b>Hello, Cooper Hobson</b></p>
                                <p class="text-muted font-13">
                                    Vui lòng tìm bên dưới bảng phân tích chi phí cho công việc gần đây đã hoàn thành. Vui lòng thanh toán sớm nhất có thể và đừng ngần ngại liên hệ với tôi nếu có bất kỳ câu hỏi nào.

                                </p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-sm-4 offset-sm-2">
                            <div class=" float-sm-end">
                                <p class="font-13"><strong>Ngày đặt hàng: </strong> &nbsp;&nbsp;&nbsp; {{ $orderdetails->created_at->format('d-m-Y ') }}</p>
                                <p class="font-13"><strong>Tình trạng: </strong>

                                    @if($orderdetails->status_message == "Đang chờ xử lý")
                                    <span style="float: right; font-size:12px" class="badge badge-warning-lighten">{{$orderdetails->status_message}}</span>
                                    @elseif($orderdetails->status_message == "Hoàn thành")
                                    <span style="float: right; font-size:12px" class="badge badge-success-lighten">{{$orderdetails->status_message}}</span>
                                    @else($orderdetails->status_message == "Đơn hàng hủy")
                                    <span style="float: right; font-size:12px" class="badge badge-danger-lighten">{{$orderdetails->status_message}}</span>
                                    @endif
                                </p>
                                <p class="font-13"><strong>Mã đặt hàng: </strong> <span class="float-end">Ord-{{$orderdetails->id}}</span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <h6>Địa chỉ thanh toán</h6>
                            <div>
                                <span>Tên: {{$orderdetails->name}}</span>
                            </div>
                            <div>
                                <span>Email: {{$orderdetails->email}}</span>
                            </div>
                            <div>
                                <span>Phone: {{$orderdetails->phone}}</span>
                            </div>
                            <div>
                                <span>Địa chỉ: {{$orderdetails->address}}</span>
                            </div>

                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <h6>Địa chỉ giao hàng</h6>
                            <div>
                                <span>Tên: {{$orderdetails->name}}</span>
                            </div>
                            <div>
                                <span>Email: {{$orderdetails->email}}</span>
                            </div>
                            <div>
                                <span>Phone: {{$orderdetails->phone}}</span>
                            </div>
                            <div>
                                <span>Địa chỉ: {{$orderdetails->address}}</span>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <img src="{{asset('admin/assets/images/barcode.png')}}" alt="barcode-image" class="img-fluid me-2">
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="table-responsive " style="">
                                <table class="table table-centered table-hover dt-responsive nowrap w-100  no-footer" id="">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                STT
                                            </th>
                                            <th>Sản phẩm</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-end">Đơn giá</th>
                                            <th class="text-end">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $totalprice = 0;
                                        @endphp
                                        @foreach($orderdetails->OrderItem as $key=> $item)
                                        <tr>

                                            <td class="text-center">
                                                {{++$key}}
                                            </td>
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
                                            <td class="text-end">{{ str_replace(',', '.', number_format(($item->price))) }}₫</td>
                                            <td class="text-end">{{ str_replace(',', '.', number_format(($item->price)*($item->quantity) )) }}₫</td>


                                        </tr>


                                        @php
                                        $totalprice += $item->price*$item->quantity;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-3">
                                <h6 class="text-muted">Ghi chú:</h6>
                                <small>
                                    Tất cả các tài khoản sẽ được thanh toán trong vòng 7 ngày kể từ ngày nhận hóa đơn. Được thanh toán bằng séc hoặc thẻ tín dụng hoặc thanh toán trực tiếp trực tuyến. Nếu tài khoản không được thanh toán trong vòng 7 ngày, các chi tiết tín dụng được cung cấp dưới dạng xác nhận công việc đã thực hiện sẽ bị tính phí theo thỏa thuận đã nêu ở trên.

                                </small>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end mt-3 mt-sm-0" style="max-width: 200px;    width: 100%;">
                                @if($orderdetails->payment_mode != "Paypal")

                                <p><b>Tổng phụ:</b> <span class="float-end">{{ str_replace(',', '.', number_format(($totalprice ))) }}₫</span></p>
                                <p><b>Giảm giá:</b> <span class="float-end">-10.000</span></p>
                                <p><b>Phí vận chuyển:</b> <span class="float-end">30.000</span></p>
                                <p><b>VAT (5%): </b> <span class="float-end">{{ str_replace(',', '.', number_format(($totalprice)*0.05)) }}₫</span></p>
                                <h3>{{ str_replace(',', '.', number_format(($orderdetails->payment->amount))) }}₫</h3>
                                @else
                                <p><b>Tổng phụ:</b> <span class="float-end">${{ str_replace(',', '.', number_format(($totalprice )/23000)) }}</span></p>
                                <p><b>Giảm giá:</b> <span class="float-end">$-{{0.4}}</span></p>
                                <p><b>Phí vận chuyển:</b> <span class="float-end">$ {{1.4}}</span></p>
                                <p><b>VAT (5%): </b> <span class="float-end">${{ str_replace(',', '.', number_format(($totalprice)/23000 *0.05)) }}</span></p>
                                <h3>${{ str_replace(',', '.', number_format(($orderdetails->payment->amount))) }} </h3>


                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>





                    <form action="{{route('order.update',$orderdetails->id)}}" method="post" >

                        @csrf
                        @method('PUT')


                        <div class="row " style="justify-content: end;">
                            <div class="col-sm-4 d-flex  " style="gap: 10px;">
                                <select name="status_message" class="form-control select2" data-toggle="select2" style="">
                                    <option value="Đang chờ xử lý">1111</option>

                                    <option value="Đang chờ xử lý" {{ ($orderdetails->status_message) =="Đang chờ xử lý"  ?'selected' :  ''      }}>Đang chờ xử lý</option>
                                    <option value="Hoàn thành" {{ ($orderdetails->status_message) =="Hoàn thành"  ?'selected' :  ''      }}>Hoàn thành</option>
                                    <option value="Đơn hàng hủy" {{ ($orderdetails->status_message) =="Đơn hàng hủy"  ?'selected' :  ''      }}>Đơn hàng hủy</option>

                                </select>

                                <button type="submit"  class="btn btn-success">Update</button>
                            </div>
                        </div>

                    </form>
                    <!-- end buttons -->

                </div> <!-- end card-body-->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
</div>

@endsection
