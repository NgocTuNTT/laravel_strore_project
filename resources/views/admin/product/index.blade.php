@extends('layouts.admin')
@section('title','Sản phẩm')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        @can('create-product')
                        <a href="{{route('product.create')}}" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm mới</a>
                        @endcan
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
                                <th>Sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th style="text-align: center;">Trạng thái</th>
                                <th style="width: ;text-align: center;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $key=> $pro)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="sorting_1">
                                @if($pro->productImages->count() >0)
                                    <img src="{{asset($pro->productImages[0]->image)}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48">

                                        @if($pro->productImages->count() >1)

                                        <img src="{{asset($pro->productImages[1]->image)}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                         @endif

                                    @endif

                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="{{route('product.edit',$pro->id)}}" class="text-body">{{$pro->name}}</a>
                                        <br>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                    </p>
                                </td>
                                <td class="text-body fw-semibold">
                                    {{$pro->category->name}}
                                </td>

                                <td class="text-body fw-semibold">
                                    @if($pro->original_price == $pro->selling_price)
                                    {{ number_format($pro->selling_price) }} @else
                                    <span style="text-decoration: line-through;font-size: 12px;"> {{ number_format($pro->selling_price) }}</span>
                                    <span class="text-danger">{{ number_format($pro->selling_price) }}</span>

                                @endif
                                </td>
                                <td class="text-body fw-semibold">
                                    {{$pro->quantity}}
                                </td>

                                <td class="text-body fw-semibold" style="text-align: center;">
                                    @if($pro->status ==0)
                                    <span class="badge bg-success ">Active</span>
                                    @else
                                    <span class="badge bg-danger">Deactive</span>

                                    @endif

                                </td>

                                <td style="text-align: center;">
                                    @can('edit-product')

                                    <a href="{{route('product.edit',$pro->id)}}" class="action-icon"> <i class="mdi mdi-pencil" style="    color: #0acf97;"></i></a>
                                    @endcan
                                    @can('delete-product')


                                    <a data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$pro->id}} " class="action-icon"><i style="    color: red;" class="mdi mdi-delete"></i></a> @endcan

                                    <div id="danger-header-modal{{$pro->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Xóa {{$pro->name}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bạn có chắc xóa?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>


                                                    <form action="{{route('product.destroy',$pro->id)}}" method="post">
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



                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

@endsection
