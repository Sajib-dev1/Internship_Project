
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
        <title>Dashboard | Dashtrap - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Myra Studio" name="author" />

        <!-- third party css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="{{ asset('backend') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- third party css end -->

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.ico">
        <link href="{{ asset('backend') }}/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />
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
    </head>

    <body>

        <!-- Begin page -->
        <div class="layout-wrapper">

            <!-- ========== Left Sidebar ========== -->
            @include('include.saidebarAdmin')
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="page-content">

                <!-- ========== Topbar Start ========== -->
                @include('include.topbar')
                <!-- ========== Topbar End ========== -->

                <div class="px-3">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="py-3 py-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="page-title mb-0">@yield('pageTitle')</h4>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <!-- third party js ends -->

        <!-- Datatables js -->
        <script src="{{ asset('backend') }}/js/pages/datatables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{ asset('backend') }}/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="{{ asset('backend') }}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="{{ asset('backend') }}/libs/morris.js/morris.min.js"></script>
        <script src="{{ asset('backend') }}/libs/raphael/raphael.min.js"></script>
        <script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>
        @yield('footer_script')

    </body>
<!-- Mirrored from myrathemes.com/dashtrap/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:30 GMT -->
</html>