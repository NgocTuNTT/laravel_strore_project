@extends('layouts.admin')
@section('title','Sửa' )
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="col-sm-4 mt-3">
                <a href="{{route('slide.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>
<form action="{{route('slide.update',$slide->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">

                <div class="card-body">

                    <div class="col-sm-12 text-left">
                        <label for="formFileMultiple" class="form-label">Thêm ảnh ở đây</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="image" value="{{ old('image')?? $slide->image}}">
                    </div>

                    <div class="dropzone-previews mt-2" id="file-previews">
                        <div class="card mt-1 mb-0 shadow-none border dz-processing dz-error dz-complete dz-image-preview">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="{{asset($slide->image)}}" style="max-width: 60px;" alt="Img">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-3" style="text-align: left;">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Trạng thái</font>
                            </font>
                        </label>
                        <div class=" col-lg-12">
                            <div class="card m-1 shadow-none    ">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col ps-0" style="    display: flex;gap: 30px;">
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="hien" {{ old('status', $slide->status)  == 0 ? 'checked' : '' }} name="status" value="0">
                                                <label class="form-check-label" for="hien">Hiện</label>

                                            </div>

                                            <div class="form-check form-check-success">

                                                <input type="radio" class="form-check-input" id="an" {{ old('status', $slide->status)  == 1 ? 'checked' : '' }} name="status" value="1">
                                                <label class="form-check-label" for="an">Ẩn</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div> <!-- end card-body -->


        </div>



        <div class="col-xl-8 col-lg-7">
            <div class="card">


                <div class="card-body">

                    <div class="tab-content">


                        <div class="tab-pane active" id="settings">
                            <form>
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Slide</font>
                                    </font>
                                </h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Title</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('title')?? $slide->title}}" name="title">
                                                @error('title')
                                                <span class="text-danger"> {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Description</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('description')?? $slide->description}}" name="description">
                                                @error('description')
                                                <span class="text-danger"> {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="text-end">
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
