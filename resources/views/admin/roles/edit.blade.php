@extends('layouts.admin')
@section('title','Phân quyền')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{route('roles.index')}}" class="btn btn-danger mb-2"><i class="dripicons-reply"></i> Quay lại</a>
                    </div>

                </div>



                <form action="{{ route('roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- <h5 class="mb-3">Example</h5> -->
                                <div class="form-floating mb-3">

                                    <div class="mb-3">
                                        <input type="text" id="simpleinput" value="{{ old('name') ?? $role->name}}" name="name" class="form-control" placeholder="Tên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- <h5 class="mb-3">Example</h5> -->
                                <div class="mb-3">
                                    <input type="text" id="simpleinput" value="{{ old('display_name') ?? $role->display_name }}" name="display_name" class="form-control" placeholder="Tên hiển thị">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <select name="ground" class="form-control select2" data-toggle="select2" value="{{$role->ground}}">
                                    @if($role->ground =='system')
                                    <option disabled>Chọn</option>
                                    <option selected value="{{$role->ground}}">{{$role->ground}}</option>
                                    <option  value="user">user</option>

                                    @else
                                    <option disabled>Chọn</option>
                                    <option value="system">System</option>
                                    <option selected value="{{$role->ground}}">{{$role->ground}}</option>
                                    @endif
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="mt-3">
                        <h5 class="mb-2">Phân Quyền</h5>

                        <div class="row mx-n1 g-0">

                            @foreach($permissions as $groupName => $permission)
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none    ">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                            </div>
                                            <div class="col ps-0">
                                                <p href="javascript:void(0);" class="text-muted fw-bold">{{$groupName}}</p>
                                                @foreach($permission as $item)

                                                <div class="form-check form-check-success">

                                                    <input type="checkbox" class="form-check-input" id="{{$item->id}}" name="permission_ids[]" value="{{$item->id}}"
                                                      {{ $role->permissions->contains('name',$item->name) ? 'checked' : ''}} >

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

                    @hasrole('super-admin')
                    <button type="submit" class="btn btn-success">Cập nhập</button>
                    @endhasrole
                </form>


            </div> <!-- end card-body-->




        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

@endsection
