@extends('layouts.admin')
@section('content')
@include('bladecompunet')
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">about</label>
                        <textarea name="about" id="" class="form-control" cols="30" rows="3">{{ Auth::user()->about }}</textarea>
                        @error('about')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Profetion</label>
                        <input type="text" name="profetion" class="form-control" value="{{ Auth::user()->profetion }}">
                        @error('profetion')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" width="200" id="blah" alt="">
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer_script')
<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif

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