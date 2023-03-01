<div class="leftside-menu" style="padding-top: 0;">

    <!-- LOGO -->
    <ul class="side-nav" style="margin: 0;">

        <li class="side-nav-item">
            <a class=" side-nav-link nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="https://scontent.fsgn5-10.fna.fbcdn.net/v/t1.6435-1/182976968_1109302452887438_6826702291110817862_n.jpg?stp=dst-jpg_s320x320&_nc_cat=107&ccb=1-7&_nc_sid=7206a8&_nc_ohc=Obn0SREJGUoAX_0AJ0G&_nc_ht=scontent.fsgn5-10.fna&oh=00_AfBsuHPY1YLn-NOcFlDoM_q5o1mamiCeAsGvq-u5NT1d_Q&oe=640FE6F1" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">
                        <div>{{ Auth()->user()->name }}</div>
                    </span>
                    <span class="">

                        @if(!empty(Auth::user()->getRoleNames()))
                        @foreach(Auth::user()->getRoleNames() as $v)

                        @if( $v == 'Admin' || $v == 'super-admin')
                        <div class="badge bg-danger ">{{ $v }}</div>

                        @else
                        <div class="badge bg-success ">{{ $v }}</div>

                        @endif
                        @endforeach
                        @endif
                    </span>

                </span>
            </a>
        </li>
    </ul>
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{route('dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span class="badge bg-success float-end">4</span>
                    <span> Dashboards </span>
                </a>
                <!-- <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="dashboard-analytics.html">Analytics</a>
                        </li>
                        <li>
                            <a href="dashboard-crm.html">CRM</a>
                        </li>
                        <li>
                            <a href="index.html">Ecommerce</a>
                        </li>
                        <li>
                            <a href="dashboard-projects.html">Projects</a>
                        </li>
                    </ul>
                </div> -->
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            @hasrole('super-admin')

            <li class="side-nav-item">
                <a href="{{route('roles.index')}}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Phân quyền </span>
                </a>
            </li>
            @endhasrole
            @can('show-user')

            <li class="side-nav-item">
                <a href="{{route('users.index')}}" class="side-nav-link">
                    <i class="uil-user-plus     "></i>
                    <span> Nhân viên </span>
                </a>
            </li>
            @endcan
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Cửa Hàng </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">

                        @can('show-product')

                        <li>
                            <a href="{{route('product.index')}}">Sản phẩm</a>
                        </li>
                        @endcan

                        @can('show-category')

                        <li>
                            <a href="{{route('category.index')}}">Danh mục</a>
                        </li>
                        @endcan


                        @can('show-brand')

                        <li>
                            <a href="{{route('brand.index')}}">Thương hiệu</a>
                        </li>
                        @endcan

                        @can('show-color')

                        <li>
                            <a href="{{route('color.index')}}">Màu sản phẩm</a>
                        </li>
                        @endcan
                        @can('show-order')

                        <li>
                            <a href="{{route('order.index')}}">Đơn hàng</a>
                        </li>
                        @endcan




                    </ul>
                </div>
            </li>
            @can('show-customer')

            <li class="side-nav-item">
                <a href="{{route('customer.index')}}" class="side-nav-link">
                    <i class="uil-user-plus     "></i>
                    <span> Khách Hàng </span>
                </a>
            </li>
            @endcan

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Giao diện </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        @can('show-slide')

                        <li>
                            <a href="{{route('slide.index')}}">Slide</a>
                        </li>
                        @endcan

                        <li>
                            <a href="apps-projects-gantt.html">Gantt <span class="badge rounded-pill badge-light-lighten font-10 float-end">New</span></a>
                        </li>
                        <li>
                            <a href="apps-projects-add.html">Create Project <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                @can('show-setting')

                <a href="{{route('setting.index')}}" class="side-nav-link">
                    <i class="dripicons-gear noti-icon"></i>
                    <span> Cài đặt </span>
                </a>
                @endcan

            </li>



        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
