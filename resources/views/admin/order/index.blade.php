@extends('layouts.admin')
@section('title','Đơn hàng')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="row mt-3">
        <div class="col-sm-4">
            <!-- <a href="http://127.0.0.1:8000/admin/color/create" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm mới</a> -->
        </div>
        <div class="col-sm-8">
            <div class="text-sm-end">
                <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                <button type="button" class="btn btn-light mb-2">Export</button>
            </div>
        </div><!-- end col-->
    </div>
    <div class="col-12 ">
        <div class="card">
            <div class="card-body">



                <div class="table-responsive">

                <table class="table table-centered  table-hover dt-responsive nowrap w-100 dataTable" id="alternative-page-datatable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Order ID</th>
                                <th>Ngày</th>
                                <th class="text-center">Tình trạng thanh toán</th>
                                <th style="text-align: center;">Tổng</th>
                                <th class="text-center">Phương thức</th>
                                <th>Tình trạng hàng</th>
                                <th style="width: 100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($order as $itemOrder)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold">Ord-{{$itemOrder->id}}</a> </td>
                                <td>
                                    <!-- August 05 2018 <small class="text-muted">10:29 PM</small> -->
                                    {{ $itemOrder->created_at->format('d-m-Y H:i:s') }}

                                </td>
                                <td class="text-center">
                                    <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Đã thanh toán</span></h5>
                                </td>
                                <td style="text-align: right">
                                    @if($itemOrder->payment)

                                    @if($itemOrder->payment->payment_method == "Tiền mặt")

                                    {{ str_replace(',', '.', number_format($itemOrder->payment->amount)) }}₫
                                    @else($itemOrder->payment->payment_method == "Tiền mặt")
                                    ${{ str_replace(',', '.', number_format($itemOrder->payment->amount)) }}
                                    @endif
                                    @else
                                    Không
                                    @endif
                                </td>

                                <td class="text-center">

                                    @if($itemOrder->payment_mode == "Tiền mặt")
                                    <!-- Tiền mặt -->
                                    <img src="{{asset('frontend/assets/images/MoMo_Logo.png')}}" style="max-height: 30px;" height="70" alt="{{$itemOrder->id}}">

                                    @else($itemorder->payment_mode == 'Paypal')
                                    <img src="{{asset('frontend/assets/images/paypal.png')}}" style="max-height: 17px;" height="25" alt="paypal-img">

                                    @endif
                                </td>
                                <td class="text-center">

                                    @if($itemOrder->status_message == "Đang chờ xử lý")
                                    <h5><span class="badge badge-warning-lighten">{{$itemOrder->status_message}}</span></h5>
                                    @elseif($itemOrder->status_message == "Hoàn thành")
                                    <h5><span class="badge badge-success-lighten">{{$itemOrder->status_message}}</span></h5>
                                    @else($itemOrder->status_message == "Đơn hàng hủy")
                                    <span class="badge badge-danger-lighten">{{$itemOrder->status_message}}</span>
                                    @endif
                                </td>


                                <td style="text-align: center;">
                                    @can('view-order')

                                    <a href="{{route('order.view',$itemOrder->id)}}" class="action-icon"> <i class="mdi mdi-eye" style="    color: #0acf97;"></i></a>
                                    @endcan
                                    @can('delete-order')


                                    <a data-bs-toggle="modal" data-bs-target="#danger-header-modal " class="action-icon"><i style="    color: red;" class="mdi mdi-delete"></i></a> @endcan

                                    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Xóa </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bạn có chắc xóa?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>

                                                    <form action="{{route('order.destroy')}}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-danger">Xác Nhận</button>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div> <!-- end card-body-->




        </div> <!-- end card-->
    </div> <!-- end col -->


</div>

@endsection
