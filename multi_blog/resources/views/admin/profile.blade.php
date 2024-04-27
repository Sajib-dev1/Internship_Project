@extends('admin.auth.layout')
@section('content')
    <div class="row">
        <div class="col-xl-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('Super Admin Profile') }}</h4>
    
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row">
                                <div class=" d-flex justify-content-between">
                                    <div>
                                       </div>
                                       <div>
                                        <img src="" width="100" alt="">
                                       </div>
                                </div>
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="inputAboutl4" class="form-label">{{ __('About') }}</label>
                                <textarea name="about" id="" cols="30" class="form-control"  placeholder="About" rows="3">{{ Auth::guard('admin')->user()->about }}</textarea>
                                @error('about')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="row mt-3">
                                <div class="mb-2 col-md-6">
                                    <label for="inputNamel4" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" id="inputNamel4" placeholder="Name" value="{{ Auth::guard('admin')->user()->name }}">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputProfetion4" class="form-label">{{ __('Profetion') }}</label>
                                    <input type="text" name="profetion" class="form-control" id="inputProfetionl4" placeholder="Profetion" value="{{ Auth::guard('admin')->user()->profetion }}">
                                    @error('profetion')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mt-3">
                                <div class="mb-2 col-md-6">
                                    <label for="inputCountry4" class="form-label">{{ __('Country') }}</label>
                                    <select name="country" id="Country" class="form-control country" id="">
                                        <option value="" selected disabled>Select Country</option>
                                        @foreach ( $countries as $country )
                                            <option value="{{ $country->id }}" {{ Auth::guard('admin')->user()->country == $country->id ?'selected':'' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="inputCity4" class="form-label">{{ __('City') }}</label>
                                    <select name="city" id="City" class="form-control city" id="">
                                        <option value="">Select City</option>
                                    </select>
                                    @error('city')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="mb-2 col-md-6">
                                    <label class="form-label">{{ __('Photo') }}</label>
                                    <input type="file" class="form-control" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    @error('photo')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label class="form-label">{{ __('Phone') }}</label>
                                    <input type="tel" class="form-control" name="phone" value="{{ Auth::guard('admin')->user()->phone }}">
                                    @error('phone')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-6">
                                    <img src="{{ asset('uploads/admin') }}/{{ Auth::guard('admin')->user()->photo }}" width="100" alt="" id="blah">
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
<script>
    $('.country').change(function(){
        var country_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/getcity',
            data: { 'country_id':country_id },
            success: function( data ) {
                $('.city').html(data)
            }
        });
    });
</script>
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