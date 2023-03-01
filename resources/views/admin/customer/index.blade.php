@extends('layouts.admin')
@section('title','Khách hàng')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <a href="{{route('customer.create')}}" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm mới</a>

                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive card" style="padding: 15px;">
                <table class="table table-centered  table-hover dt-responsive nowrap w-100 dataTable" id="alternative-page-datatable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Khách hàng</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th style="width: 75px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($customer as $cus)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body fw-semibold">{{$cus->name}}</a>
                                </td>
                                <td>
                                <a href="tel:0{{$cus->phone}}">0{{$cus->phone}}</a>
                                </td>
                                <td>
                                    <a href="mailto:{{$cus->email}}">{{$cus->email}}</a>
                                </td>

                                <td>
                                    {{($cus->gender == 0) ? 'Nam' :' Nữ '}}
                                </td>
                                <td>
                                    07/07/2018
                                </td>
                                <td>
                                    {{$cus->address}}
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
