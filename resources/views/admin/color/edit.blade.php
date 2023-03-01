@extends('layouts.admin')
@section('title','Sửa' )
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="col-sm-4 mt-3">
                <a href="{{route('color.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>
<form action="{{route('color.update',$color->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form>
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Product Colors</font>
                                    </font>
                                </h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Name</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('name')?? $color->name}}" name="name">
                                                @error('name')
                                                <span class="text-danger"> {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Code</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('code') ?? $color->code}}" name="code">
                                                @error('code')
                                                <span class="text-danger"> {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" col-lg-12">
                                            <div class="card m-1 shadow-none    ">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col ps-0" style="    display: flex;gap: 30px;">
                                                            <div class="form-check form-check-success">
                                                            <input type="radio" class="form-check-input" id="hien" name="status" value="0" {{ old('status', $color->status)  == 0 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="hien">Hiện</label>
                                                            </div>
                                                            <div class="form-check form-check-success">
                                                            <input type="radio" class="form-check-input" id="hien" name="status" value="1" {{ old('status', $color->status)  == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="an">Ẩn</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Thêm Mới</font>
                                        </font>
                                    </button>
                                </div>


                            </form>
                        </div>

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->

            </div> <!-- end card -->
        </div>

    </div>


</form>

@endsection
