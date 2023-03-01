@extends('layouts.admin')
@section('title','Sửa' )
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="col-sm-4 mt-3">
                <a href="{{route('category.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>
<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">

                <div class="card-body">

                    <div class="fallback">
                        <input type="file"  value="{{ old('image')}}" name="image" />
                    </div>

                    <div class="dz-message needsclick">
                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                        <h3>Thêm ảnh ở đây</h3>
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
                                                <input type="radio" class="form-check-input" id="hien" checked name="status" value="0">
                                                <label class="form-check-label" for="hien">Hiện</label>

                                            </div>

                                            <div class="form-check form-check-success">

                                                <input type="radio" class="form-check-input" id="an" name="status" value="1">
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
                                        <font style="vertical-align: inherit;">Danh mục</font>
                                    </font>
                                </h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Tên</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('name')}}" name="name">
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
                                                        <font style="vertical-align: inherit;">Slug</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('slug')}}" name="slug">
                                                @error('slug')
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
                                                <input type="text" class="form-control" id="" placeholder="" value="{{ old('description')}}" name="description">

                                                @error('description')
                                                <span class="text-danger"> {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end row -->





                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Seo </font>
                                    </font>

                                </h5>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Meta tile</font>
                                                </font>
                                            </label>
                                            <input type="text" class="form-control" id="" placeholder="" value="{{ old('meta_title')}}" name="meta_title">

                                            @error('meta_title')
                                            <span class="text-danger"> {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Meta Keyword</font>
                                                </font>
                                            </label>

                                            <input type="text" class="form-control" id="" placeholder="" value="{{ old('meta_keyword')}}" name="meta_keyword">
                                            @error('meta_keyword')
                                            <span class="text-danger"> {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Meta Description</font>
                                                </font>
                                            </label>
                                            <input type="text" class="form-control" id="" placeholder="" value="{{ old('meta_description')}}" name="meta_description">

                                            @error('meta_description')
                                            <span class="text-danger"> {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end row -->


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
