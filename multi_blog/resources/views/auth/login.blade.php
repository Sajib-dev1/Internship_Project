<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Log In | Dashtrap - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('uploads/logo') }}/{{ App\Models\FabiconLogo::first()->logo }}">

    <!-- App css -->
    <link href="{{ asset('backend') }}//css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend') }}//css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('backend') }}//js/config.js"></script>
</head>

<body class="bg-primary d-flex justify-content-center align-items-center min-vh-100 p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                            <a class='logo-dark' href='index.html'>
                                <img src="{{ asset('uploads/admin') }}/{{ App\Models\AdminLogo::first()->logo }}" alt="logo" class="logo-lg" height="28">
                            </a>

                            <a class='logo-light' href='{{ route('login') }}'>
                                <img src="{{ asset('uploads/admin') }}/{{ App\Models\AdminLogo::first()->logo }}" alt="logo" class="logo-lg" height="28">
                            </a>
                        </div>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label" for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" :value="old('email')" required=""
                                    placeholder="Enter your email">
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    <strong class="text-danger">{{ session('wrong') }}</strong>
                            </div>

                            <div class="form-group mb-3">
                                <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" name="password" type="password" required="" id="password"
                                    placeholder="Enter your password">
                                @error('password')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                @if (session('reset'))
                                <strong class="text-danger">{{ session('reset') }}</strong>
                                @endif
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit"> Log In </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <p class="text-white-50">Don't have an account? <a class="text-white font-weight-medium ms-1" href="{{ route('register') }}">Sign Up</a></p>
            </div>
        </div>
    </div>

    <!-- App js -->
    <script src="{{ asset('backend') }}//js/vendor.min.js"></script>
    <script src="{{ asset('backend') }}//js/app.js"></script>

</body>
</html>


