@extends('layouts.admin')
@section('title','Phân quyền')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <div class="col-sm-4 mt-3">
                    <a href="{{route('roles.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
                </div>
                <!-- <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div> -->
            </div>


            <div style="padding: 15px;" class="card">
                <form action="{{ route('roles.store')}}" method="post">
                    @csrf
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- <h5 class="mb-3">Example</h5> -->
                                <div class="form-floating mb-3">

                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Tên</font>
                                            </font>
                                        </label>
                                        <input type="text" id="simpleinput" value="{{ old('name')}}" name="name" class="form-control" placeholder="Tên">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- <h5 class="mb-3">Example</h5> -->
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Tên</font>
                                        </font>
                                    </label>
                                    <input type="text" id="simpleinput" value="{{ old('display_name')}}" name="display_name" class="form-control" placeholder="Tên hiển thị">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="lastname" class="form-label">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Tên</font>
                                    </font>
                                </label>
                                <select name="ground" class="form-control select2" data-toggle="select2">
                                    <option>Chọn</option>

                                    <option value="system">System</option>
                                    <option value="user">user</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="mt-3">
                        <h5 class="mb-2">Phân Quyền</h5>

                        <div class="row mx-n1 g-0">

                            @foreach($permmissons as $groupName => $per)
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none    ">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- <div class="avatar-sm">
                                                                            <span class="avatar-title bg-light text-secondary rounded">
                                                                                <i class="mdi mdi-folder-account font-18"></i>
                                                                            </span>
                                                                        </div> -->
                                            </div>
                                            <div class="col ps-0">
                                                <p href="javascript:void(0);" class="text-muted fw-bold">{{$groupName}}</p>
                                                @foreach($per as $item)

                                                <div class="form-check form-check-success">

                                                    <input type="checkbox" class="form-check-input" id="{{$item->id}}" name="permission_ids[]" value="{{$item->id}}">
                                                    <label class="form-check-label" for="{{$item->id}}">{{$item->display_name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->
                            @endforeach
                        </div> <!-- end row-->
                    </div>


                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </form>
            </div>



        </div> <!-- end card-body-->




    </div> <!-- end card-->
</div> <!-- end col -->
</div>

@endsection
