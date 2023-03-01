@extends('layouts.admin')
@section('title','Sửa' )
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="col-sm-4 mt-3">
                <a href="{{route('users.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">

            <div class="card-body">
                <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="hình ảnh hồ sơ cá nhân">
                <h4 class="mb-0 mt-2">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Soeng Souy</font>
                    </font>
                </h4>
                <p class="text-muted font-14">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Người sáng lập</font>
                    </font>
                </p>



                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Về tôi :</font>
                        </font>
                    </h4>
                    <p class="text-muted font-13 mb-3">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                Xin chào, tôi là Johnathn Deo, đã trở thành văn bản giả tiêu chuẩn của ngành kể từ những năm 1500, khi một nhà in không xác định lấy được một kiểu chữ.
                            </font>
                        </font>
                    </p>
                    <p class="text-muted mb-2 font-13"><strong>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Tên đầy đủ : </font>
                            </font>
                        </strong> <span class="ms-2">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Geneva D. McKnight</font>
                            </font>
                        </span></p>

                    <p class="text-muted mb-2 font-13"><strong>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Di động : </font>
                            </font>
                        </strong><span class="ms-2">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">(123) 123 1234</font>
                            </font>
                        </span></p>

                    <p class="text-muted mb-2 font-13"><strong>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Email: </font>
                            </font>
                        </strong> <span class="ms-2 ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">user@email.domain</font>
                            </font>
                        </span></p>

                    <p class="text-muted mb-1 font-13"><strong>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Địa điểm: </font>
                            </font>
                        </strong> <span class="ms-2">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Hoa Kỳ</font>
                            </font>
                        </span></p>
                </div>

                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul>
            </div> <!-- end card-body -->


        </div> <!-- end card -->

        <!-- Messages-->



    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">

            <form action="{{ route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="tab-content">


                        <div class="tab-pane active" id="settings">
                            <form>
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Thông tin cá nhân</font>
                                    </font>
                                </h5>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Tên</font>
                                                </font>
                                            </label>
                                            <input type="text" class="form-control" id="lastname" placeholder="Nhập họ" value="{{ old('name')}}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                            <label for="lastname" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Ảnh</font>
                                                </font>
                                            </label>
                                            <input type="file" class="form-control"  accept="image/*" value="" name="image">
                                        </div>
                                    </div>

                                </div> <!-- end row -->


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Số điện thoại</font>
                                                </font>
                                            </label>
                                            <input type="text" class="form-control" id="useremail" placeholder="nhập email" value="{{ old('phone')}}" name="phone">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-3" data-select2-id="5">
                                            <label for="project-overview" class="form-label">Giới tính</label>

                                            <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="gender" data-select2-id="" tabindex="-1" aria-hidden="true">

                                                <option>Chọn</option>

                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>

                                            </select>

                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Email</font>
                                                </font>
                                            </label>
                                            <input type="email" class="form-control" id="useremail" placeholder="nhập email" value="{{ old('email')}}" name="email">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                            <label for="userpassword" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Mật khẩu</font>
                                                </font>
                                            </label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Nhập mật khẩu" name="password">

                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Địa chỉ</font>
                                                </font>
                                            </label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Nhập mật khẩu" name="address" value="{{ old('address')}}">

                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Thông tin công ty</font>
                                    </font>
                                </h5>
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="project-overview" class="form-label">Chức vụ</label>

                                            <div class=" col-lg-12">
                                                <div class="card m-1 shadow-none    ">
                                                    <div class="p-2">
                                                           <div class="row align-items-center">
                                                            <div class="col ps-0" style="    display: flex;gap: 30px;">
                                                            @foreach($roles as $groupName => $role)

                                                                @foreach($role as $item)

                                                                <div class="form-check form-check-success">

                                                                    <input type="radio" class="form-check-input" id="{{$item->id}}" name="role_ids[]"
                                                                    value="{{$item->id}}">
                                                                    <label class="form-check-label" for="{{$item->id}}">{{$item->display_name}}</label>
                                                                </div>


                                                                @endforeach
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- end row -->
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Mạng XÃ HỘI</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-fb" class="form-label">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                                <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-tw" class="form-label">Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                                <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-insta" class="form-label">Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                                <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-lin" class="form-label">Linkedin</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                                <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-sky" class="form-label">Skype</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                                <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-gh" class="form-label">Github</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                                <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Cập Nhập</font>
                                        </font>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->

            </form>
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection
