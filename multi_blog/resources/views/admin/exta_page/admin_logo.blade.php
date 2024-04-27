@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Admin dashboard Logo</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.logo.update',$admin_logo_info->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Admin logo</label>
                        <input type="file" name="logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        @error('logo')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/admin') }}/{{ $admin_logo_info->logo }}" id="blah" width="100" alt="">
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Frontend Logo</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('frontend.logo.update',$frontend_logo_info->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Frontend logo</label>
                        <input type="file" name="logo" class="form-control" onchange="document.getElementById('font').src = window.URL.createObjectURL(this.files[0])">
                        @error('logo')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/logo') }}/{{ $frontend_logo_info->logo }}" id="font" width="100" alt="">
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Fabicon Logo</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('favicon.logo.update',$favicon_info->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Fabicon logo</label>
                        <input type="file" name="logo" class="form-control" onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])">
                        @error('logo')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/logo') }}/{{ $favicon_info->logo }}" id="favicon" width="100" alt="">
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div> 
@endsection
@section('footer_script')
<script>
    @if(Session::has('update'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('update') }}");
    @endif
</script>
@endsection