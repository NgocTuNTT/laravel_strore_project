<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title','Quản Trị')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" type="image/png" sizes="16x16" style="border-radius: 50px;" href="{{asset('admin/assets/images/favicon-16x16.png')}}">
    <!-- App css -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{asset('admin/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">
    <link href="{{asset('admin/assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/vendor/select.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet" type="text/css">


</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"light","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.inc.admin.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                @include('layouts.inc.admin.navbar')
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->



                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar="">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1">

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>


                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                    <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->






    <!-- bundle -->
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>

    <!-- Apex js -->
    <script src=" {{asset('admin/assets/js/vendor/apexcharts.min.js')}}"></script>

    <!-- Todo js -->
    <script src="  {{asset('admin/assets/js/ui/component.todo.js')}}"></script>

    <!-- demo app -->
    <script src="{{asset('admin/assets/js/pages/demo.dashboard-crm.js')}}"></script>
    <!-- end demo js-->
    <!-- third party js -->

    <script src="{{asset('admin/assets/js/pages/demo.datatable-init.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dataTables.checkboxes.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/demo.customers.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dropzone.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/ui/component.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dataTables.select.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/vendor/buttons.flash.min.js')}}"></script>





    <script type="text/javascript">
        // var trg = $('acbcsad:eq(1) input');

        // var srca = $('N:eq(0) input').on('input', function() {

        //     trg.eq($.inArray(this, srca)).val($(this).val());

        // }).get()


        // var src = $('form.mt-4.mb-4.ml-4:eq(0) input'),
        //     srca = src.get();
        // var trg = $('form.mt-4.mb-4.ml-4:eq(1) input');
        // src.keyup(function() {
        //     var idx = $.inArray(this, srca);
        //     var txt = $(this).val();
        //     trg.eq(idx).val(txt);
        // })

        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(

                `<div class="row ">
                            <div class="col-lg-3 ">
                                <div class="form-floating mb-3">

                                    <div class="mb-3 " >

                                        <input type="text"  value="" name="inputs[` + i + `][name]" class="form-control" placeholder="Create-name">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <div class="mb-3 ">

                                    <input type="text"  value="{{ old('ground')}}" name="inputs[` + i + `][display_name]" class="form-control" placeholder="Tên hiển thị">
                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <!-- <h5 class="mb-3">Example</h5> -->
                                <div class="mb-3">

                                    <input type="text"  value="{{ old('ground')}}" name="inputs[` + i + `][ground]" class="form-control" placeholder="Group Tên ">
                                </div>
                            </div>

                            <div class="col-lg-3 remove-permmissons">

                                <button type="button"  class="btn btn-danger "><i class="mdi mdi-delete"></i> Xóa</button>

                            </div>
                        </div>`
            );


        });
        $(document).on('click', '.remove-permmissons', function() {
            $(this).parent('div').remove();
        });
    </script>
    @yield('scripts')

</body>

</html>
