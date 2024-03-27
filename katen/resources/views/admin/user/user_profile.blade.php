@extends('layouts.admin')
@section('pageTitle')
    Profile
@endsection
@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ __('Update Profile') }}</h4>

                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label for="inputNamel4" class="form-label">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" id="inputNamel4" placeholder="Name">
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="form-label">{{ __('Photo') }}</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Sign in') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        @if(Session::has('updated'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('updated') }}");
        @endif
    </script>
@endsection