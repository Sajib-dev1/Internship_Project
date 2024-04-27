<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Sajib - @forelse (Request::segments() as $segment ){{ ucwords($segment) }} @empty Home @endforelse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('uploads/logo') }}/{{ App\Models\FabiconLogo::first()->logo }}">
    <link href="{{ asset('backend') }}/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="{{ asset('backend') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('backend') }}/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend') }}/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('backend') }}/js/config.js"></script>
    <style>
        .toast{
        width : 350px !important;
        top : 70px !important;
        }
        .toast-success {
            background-color: #51a351 !important;
        }
        .toast-error {
            background-color: #bd362f !important;
        }
        .user_photo_comment{
            width: 24px !important;
            height: 24px !important;
            border-radius: 50% !important;
            object-fit: cover;
        }
        .alert_comment{
            background: #cdcaca;
            margin-bottom: 10px
        }
        .alert_comment a{
            color: #000;
            padding: 0 20px;
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a class='logo-light' href='{{ route('dashboard') }}'>
                <img src="{{ asset('uploads/admin') }}/{{ App\Models\AdminLogo::first()->logo }}" alt="logo" class="logo-lg" height="28">
                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
            </a>

            <!-- Brand Logo Dark -->
            <a class='logo-dark' href='index.html'>
                <img src="{{ asset('backend') }}/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
            </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('index') }}'>
                            <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                            <span class="menu-text"> Home page </span>
                        </a>
                    </li>

                    <li class="menu-title">Custom</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('socil.icon') }}'>
                            <span class="menu-icon"><i class="bx bx-calendar"></i></span>
                            <span class="menu-text"> Socil Icon </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text">New Blog</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('blog') }}'>
                                        <span class="menu-text">Blog</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('blog.list') }}'>
                                        <span class="menu-text">Blog List</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('soft.delete') }}'>
                                        <span class="menu-text">Soft Delete</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuLayouts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-layout"></i></span>
                            <span class="menu-text">Page Part</span>
                            <span class="badge bg-blue ms-auto">New</span>
                        </a>
                        <div class="collapse" id="menuLayouts">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('menu') }}'>
                                        <span class="menu-text">Menu</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('role.manag') }}'>
                                        <span class="menu-text">Role Menag</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='index.html'>
                                <img src="{{ asset('backend') }}/images/logo-light.png" alt="logo" class="logo-lg" height="22">
                                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <img src="{{ asset('backend') }}/images/logo-dark.png" alt="dark logo" class="logo-lg" height="22">
                                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell font-size-24"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">{{ App\Models\Comment::where('bloger_id',Auth::id())->where('status',1)->count() }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-3">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-size-16 fw-semibold"> Notification</h6>
                                        </div>
                                    </div>
                                    <style>
                                        .text-li{
                                            display: block;
                                            color: #353535;
                                        }
                                    </style>
                                </div>
                                <ul style="margin-right: 31px;">
                                    @foreach ( App\Models\Comment::latest()->take(5)->get() as $comment )
                                    @if ($comment->status == 1)
                                    <li class="my-2"><a href="{{ route('blog.single',$comment->blog_id) }}" data-status="{{ $comment->status }}" comment-id="{{ $comment->id }}" class="bg-light p-3 text-li comment_btn_toggle">
                                        {{ Str::substr($comment->comment,0,52).'..'}}</a>
                                    </li>
                                    @else  
                                    <li class="my-2"><a href="{{ route('blog.single',$comment->blog_id) }}" data-status="{{ $comment->status }}" class="p-3 text-li comment_btn_toggle">
                                        {{ Str::substr($comment->comment,0,52).'..'}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                            </div>
                        </li>
                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if (Auth::user()->photo == null)
                                <img src="{{ Avatar::create( Auth::user()->name )->toBase64() }}" width="50"  class="rounded-circle"/>
                                @else 
                                    <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" class="rounded-circle" width="50" alt=""> 
                                @endif
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('user.profile') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('my.blog') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Blog</span>
                                </a>
                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <x-responsive-nav-link :href="route('logout')"  class='dropdown-item notify-item'
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </x-responsive-nav-link>
                                </form>

                            </div>
                        </li>
          
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- end page title -->
                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('backend') }}/js/vendor.min.js"></script>
    <script src="{{ asset('backend') }}/js/app.js"></script>

    <!-- third party js -->
    <script src="{{ asset('backend') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables js -->
    <script src="{{ asset('backend') }}/js/pages/datatables.js"></script>
    <!-- Knob charts js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('backend') }}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/libs/morris.js/morris.min.js"></script>
    <script src="{{ asset('backend') }}/libs/raphael/raphael.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Dashboard init-->
    <script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>
    @yield('footer_script')
    <script>
        $('.comment_btn_toggle').click(function(){
            let comment_id = $(this).attr('comment-id');
            let status = $(this).attr('data-status');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '/getcommentalertstatus',
                data: { 'comment_id':comment_id,'status':status },
                success: function( data ) {
                }
            });
        });
    </script>
</body>
<!-- Mirrored from myrathemes.com/dashtrap/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:30 GMT -->
</html>