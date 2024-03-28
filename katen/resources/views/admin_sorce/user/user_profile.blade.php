@extends('layouts.admin')
@section('pageTitle')
    Profile
@endsection
@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ __('Update Profile') }}</h4>

                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="row">
                            <div class=" d-flex justify-content-between">
                                <div>
                                   </div>
                                   <div>
                                    <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" width="100" alt="">
                                   </div>
                            </div>
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="inputAboutl4" class="form-label">{{ __('About') }}</label>
                            <textarea name="about" id="" cols="30" class="form-control"  placeholder="About" rows="3">{{ Auth::user()->about }}</textarea>
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-6">
                                <label for="inputNamel4" class="form-label">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" id="inputNamel4" placeholder="Name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputProfetion4" class="form-label">{{ __('Profetion') }}</label>
                                <input type="text" name="profetion" class="form-control" id="inputProfetionl4" placeholder="Profetion" value="{{ Auth::user()->profetion }}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="mb-2 col-md-6">
                                <label for="inputCountry4" class="form-label">{{ __('Country') }}</label>
                                <select name="country" id="Country" class="form-control country" id="">
                                    <option value="" selected disabled>Select Country</option>
                                    @foreach ( $countries as $country )
                                        <option value="{{ $country->id }}" {{ Auth::user()->country == $country->id ?'selected':'' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputCity4" class="form-label">{{ __('City') }}</label>
                                <select name="city" id="City" class="form-control city" id="">
                                    <option value="">{{ Auth::user()->rel_to_city->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="mb-2 col-md-6">
                                <label class="form-label">{{ __('Photo') }}</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label">{{ __('Phone') }}</label>
                                <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ __('Update Password') }}</h4>

                <form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="mb-2 col-md-12">
                            <label for="" class="form-label">{{ __('Old Password') }}</label>
                            <input type="password" name="current_password" class="form-control" id="">
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="" class="form-label">{{ __('New Password') }}</label>
                            <input type="password" name="password" class="form-control" id="">
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" id="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
@endsection