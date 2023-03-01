@extends('layouts.admin')
@section('title','Danh mục')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        @can('create-brand')
                        <a href="{{route('slide.create')}}" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm mới</a>
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
                    <table class="table table-centered  table-hover dt-responsive nowrap w-100 dataTable" id="products-datatable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Ảnh</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th style="text-align: center;">Trạng thái</th>
                                <th style="width: 75px;text-align: center;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $key=> $sli)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>

                                <td class="">
                                    <img src="{{asset($sli->image)}}" style="max-width: 150px;" alt="">
                                </td>
                                <td class="text-body fw-semibold">
                                    {{$sli->title}}
                                </td>

                                <td class="text-body fw-semibold">
                                    {{$sli->description}}
                                </td>

                                <td class="text-body fw-semibold" style="text-align: center;">
                                    @if($sli->status ==0)
                                    <span class="badge bg-success ">Active</span>
                                    @else
                                    <span class="badge bg-danger">Deactive</span>

                                    @endif

                                </td>


                                <td style="text-align: center;">
                                    @can('edit-slide')

                                    <a href="{{route('slide.edit',$sli->id)}}" class="action-icon"> <i class="mdi mdi-pencil" style="    color: #0acf97;"></i></a>
                                    @endcan



                                    @can('delete-slide')


                                    <a data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$sli->id}} " class="action-icon"><i style="    color: red;" class="mdi mdi-delete"></i></a>
                                     @endcan

                                    <div id="danger-header-modal{{$sli->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Xóa {{$sli->title}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bạn có chắc xóa?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>


                                                    <form action="{{route('slide.destroy',$sli->id)}}" method="post">
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
