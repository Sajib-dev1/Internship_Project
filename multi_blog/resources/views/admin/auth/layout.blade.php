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

    <!-- third party css -->
    <link href="{{ asset('backend') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App favicon -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('uploads/logo') }}/{{ App\Models\FabiconLogo::first()->logo }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('backend') }}/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />
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
    </style>
    <style>
        .toogle_btn .toggle-off.btn {
            padding-left: 24px;
            background: #e6e6e6;
        }
        .toogle_btn .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
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
                <a class='logo-light' href='index.html'>
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
                            <span class="menu-text"> Home Page </span>
                        </a>
                    </li>

                    <li class="menu-title">Custom</li>

                    {{-- <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href=''>
                            <span class="menu-icon"><i class="bx bx-calendar"></i></span>
                            <span class="menu-text"> User Information </span>
                        </a>
                    </li> --}}

                    <li class="menu-item">
                        <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Extra Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('admin.socile.icon') }}'>
                                        <span class="menu-text">Socile Icon</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href="{{ route('admin.logo') }}">
                                        <span class="menu-text">Logo</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href="{{ route('instragam') }}">
                                        <span class="menu-text">Instragam</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuLayouts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-layout"></i></span>
                            <span class="menu-text"> Report Information </span>
                            <span class="badge bg-blue ms-auto">New</span>
                        </a>
                        <div class="collapse" id="menuLayouts">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('user.info') }}'>
                                        <span class="menu-text">User Information</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('admin.blog.list') }}'>
                                        <span class="menu-text">Blog List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title">Frontend Info</li>

                    <li class="menu-item">
                        <a href="#menuComponentsui" data-bs-toggle="collapse"
                            class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-cookie"></i></span>
                            <span class="menu-text"> Frontend Part </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuComponentsui">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('category') }}'>
                                        <span class="menu-text">Category</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href="{{ route('tag') }}">
                                        <span class="menu-text">Tag</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuExtendedui" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-briefcase-alt-2"></i></span>
                            <span class="menu-text"> Clients </span>
                            <span class="badge bg-info ms-auto">Hot</span>
                        </a>
                        <div class="collapse" id="menuExtendedui">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('subscriber.all.list') }}'>
                                        <span class="menu-text">Subscriber</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('message.box') }}'>
                                        <span class="menu-text">Message Box</span>
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
                                <img src="{{ asset('backend') }}/images/logo-light.png" alt="logo" class="logo-lg"
                                    height="22">
                                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm"
                                    height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <img src="{{ asset('backend') }}/images/logo-dark.png" alt="dark logo" class="logo-lg"
                                    height="22">
                                <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm"
                                    height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                    @if (Auth::guard('admin')->user()->photo == null)
                                    <img src="{{ Avatar::create( Auth::guard('admin')->user()->name )->toBase64() }}" width="50"  class="rounded-circle"/>
                                    @else 
                                        <img src="{{ asset('uploads/admin') }}/{{ Auth::guard('admin')->user()->photo }}" class="rounded-circle" width="50" alt=""> 
                                    @endif
                                {{-- <img src="{{ asset('backend') }}/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle"> --}}
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ Auth::guard('admin')->user()->name }}<i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href="{{ route('admin.logout') }}">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="py-3 py-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="page-title mb-0">Admin Dashboard</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-none d-lg-block">
                                    <ol class="breadcrumb m-0 float-end">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashtrap</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- Knob charts js -->
    <script src="{{ asset('backend') }}/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('backend') }}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/libs/morris.js/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('backend') }}/libs/raphael/raphael.min.js"></script>
    <script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>

    <!-- third party js -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- third party js ends -->

    <!-- Datatables js -->
    <script src="{{ asset('backend') }}/js/pages/datatables.js"></script>
    @yield('footer_script')

</body>


<!-- Mirrored from myrathemes.com/dashtrap/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:30 GMT -->
</html>
