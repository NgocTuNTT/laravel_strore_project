@extends('layouts.admin')
@section('title','Phân quyền')
@section('content')

<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <div class="row mt-3">
                    <div class="col-sm-4">
                    <a href="{{route('roles.create')}}" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm vai trò</a>
                    <a href="{{route('permission.create')}}" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Thêm quyền</a>

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
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Tên hiển thị</th>
                                <th style="width: 75px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key => $role)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="">
                                    {{$role->id}}
                                </td>
                                <td class="text-body fw-semibold">
                                    {{$role->name}}
                                </td>
                                <td class="text-body fw-semibold">
                                    {{$role->display_name}}
                                </td>


                                <td>
                                    <a href="{{route('roles.edit',$role->id)}}" class="action-icon"> <i class="mdi mdi-pencil" style="    color: #0acf97;"></i></a>


                                    @if($role->id !==1)
                                    <a data-bs-toggle="modal"  data-bs-target="#danger-header-modal{{$role->id}} " class="action-icon"><i style="    color: red;" class="mdi mdi-delete"></i></a>
                                    <div id="danger-header-modal{{$role->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Xóa {{$role->name}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bạn có chắc xóa?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>


                                                    <form action="{{route('roles.destroy',$role->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-danger">Xác Nhận</button>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    @endif
                                </td>
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
