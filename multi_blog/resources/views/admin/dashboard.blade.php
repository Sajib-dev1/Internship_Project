@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0">Total Users</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            Users : {{ $user_count }}
                        </h2>
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0">Total Blogs</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            Blogs : {{ $blog_count }}
                        </h2>
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0">Total viewer</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            viewers : {{ $popular_count }}
                        </h2>
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0">Total subscribers</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            subscribers : {{ $subscriber_count }}
                        </h2>
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0">Total Message</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            Message : {{ $message_count }}
                        </h2>
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0">Total Populer Blog</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            populer Blogs : {{ $popular_blog_count }}
                        </h2>
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div>
</div>
@endsection