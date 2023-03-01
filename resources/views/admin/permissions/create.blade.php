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



            <!--These are the inputs which I'm passing the values-->


            <div style="padding: 15px;" class="card">
                <form action="{{route('permission.store')}}" method="post">


                    @csrf

                    <div class="col-lg-12" id="table">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-floating mb-3">

                                    <div class="mb-3 acbcsad" >

                                        <input type="text" id="simpleinput" value="" name="inputs[0][name]" class="form-control" placeholder="Create-name">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3 lvlvlvlvl">

                                    <input type="text" id="simpleinput" value="{{ old('ground')}}" name="inputs[0][display_name]" class="form-control" placeholder="Tên hiển thị">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!-- <h5 class="mb-3">Example</h5> -->
                                <div class="mb-3">

                                    <input type="text" id="simpleinput" value="{{ old('ground')}}" name="inputs[0][ground]" class="form-control" placeholder="Group Tên ">
                                </div>
                            </div>

                            <div class="col-lg-3">

                                <button type="button" name="add" id="add" class="btn btn-success "><i class="uil-plus"></i> Thêm</button>

                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Lưu</button>
                </form>


            </div>
            <div class="row">

                @foreach($permmissons as $groupName => $per)
                <div class="col-lg-6 col-xxl-3" style="">
                    <div class="card d-block">
                        <div class="card-body">


                            <div class="col ps-0">
                                <p href="javascript:void(0);" class="text-muted fw-bold" style="color:black">{{$groupName}}</p>
                                @foreach($per as $key => $item)

                                <div class="mb-1" style="display: flex; justify-content: space-between;align-items: center;">
                                    <div class=" form-check-success d-fex ">
                                        <label for="">{{++$key}}</label>
                                        <label class="form-check-label" for="{{$item->id}}">{{$item->display_name}}</label>




                                    </div>

                                    <form action="{{route('permission.destroy',$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger  " style="padding: 0 5px ;">
                                            <a class="action-icon"><i style="    color:white;" class="mdi mdi-delete"></i></a>

                                        </button>
                                    </form>
                                </div>

                                @endforeach
                            </div>


                        </div>
                    </div>


                </div>
                @endforeach
            </div>


        </div> <!-- end card-body-->




    </div> <!-- end card-->
</div> <!-- end col -->
</div>

@endsection
