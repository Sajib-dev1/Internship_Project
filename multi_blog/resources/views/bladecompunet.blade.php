    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashboard</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @foreach ( Request::segments() as $segment)
                    <li class="breadcrumb-item active">{{ ucwords($segment) }}</li>
                @endforeach


                </ol>
                </div>
            </div>
        </div>
    </div>
