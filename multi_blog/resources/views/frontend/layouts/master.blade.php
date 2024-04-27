<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:38 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sajib - @forelse (Request::segments() as $segment ){{ ucwords($segment) }} @empty Home @endforelse</title>
    <meta name="description" content="Sajib - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/logo') }}/{{ App\Models\FabiconLogo::first()->logo }}">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/simple-line-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" type="text/css" media="all">
    <style>
        .person_image_photo{
            width: 80px !important;
            height: 80px !important;
            border-radius: 50% !important;
        }
        .user_photo_per{
            width: 30px !important;
            height: 30px !important;
            border-radius: 50% !important;
        }
        .populer_inage_user{
            width: 60px !important;
            height: 60px !important;
            border-radius: 50% !important;
        }
        .text-muted{
            display: none !important;
        }
        .page-item:last-child{
            display: none !important;
        }
        .page-item:first-child{
            display: none !important;
        }

        .btn-tag{
            color: #8F9BAD;
            border: solid 1px #EBEBEB;
            border-radius: 25px;
            font-size: 13px;
            display: inline-block;
            padding: 3px 14px;
            margin: 4px 0;
            background: none;
        }
        .btn-tag:hover{
            border-color: #FE4F70;
            color: #FE4F70;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            content: none !important;
        }
    </style>
</head>

<body>

    <!-- preloader -->
    @include('frontend.include.preloader')
    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- site logo -->
                    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('uploads/logo') }}/{{ App\Models\FrontendLogo::first()->logo }}" alt="logo" /></a>

                    <div class="collapse navbar-collapse">
                        <!-- menus -->
                        <ul class="navbar-nav mr-auto">
                           @include('frontend.include.admin_menu')
                        </ul>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0">
                           @include('frontend.include.admin_home_icon')
                        </ul>
                        <!-- header buttons -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')

        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">&copy; {{ carbon\carbon::now()->format('Y') }} Sajib. Template by ThemeGer.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                @include('frontend.include.admin_foot_icon')
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to
                                Top</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <div class="d-flex search-form">
                <input class="form-control me-2" id="search_input" type="search" placeholder="Search and press enter ..." aria-label="Search">
                <button class="btn btn-default btn-lg search_btn" type="submit"><i class="icon-magnifier"></i></button>
            </div>
        </div>
    </div>

    <!-- canvas menu -->
    @include('frontend.include.admin_home_sidebar')

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.sticky-sidebar.min.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>




<!-- Vanilla JS -->

<script src="/path/to/draggable-piechart.js"></script>


<script src="/path/to/cdn/jquery.min.js"></script>

<script src="/path/to/cdn/draggable-piechart-jquery.js"></script>











    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.search_btn').click(function(){
            let search_input = $('#search_input').val();
            let link = "{{ route('loadmore.store') }}"+"?search_input="+search_input;
            window.location.href=link;
        });
    </script>
    @yield('footer_script')

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->
</html>
