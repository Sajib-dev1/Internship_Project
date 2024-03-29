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
                            @error('about')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-6">
                                <label for="inputNamel4" class="form-label">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" id="inputNamel4" placeholder="Name" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputProfetion4" class="form-label">{{ __('Profetion') }}</label>
                                <input type="text" name="profetion" class="form-control" id="inputProfetionl4" placeholder="Profetion" value="{{ Auth::user()->profetion }}">
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
                                        <option value="{{ $country->id }}" {{ Auth::user()->country == $country->id ?'selected':'' }}>{{ $country->name }}</option>
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
                                <input type="file" class="form-control" name="photo">
                                @error('photo')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label">{{ __('Phone') }}</label>
                                <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
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
                            @error('current_password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="" class="form-label">{{ __('New Password') }}</label>
                            <input type="password" name="password" class="form-control" id="">
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" id="">
                            @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Socile Icon List</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Icon</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $sociles as $sl=>$socile )  
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>
                                <i class="{{ $socile->icon }}" style="font-family: fontawesome"></i>
                            </td>
                            <td>
                                {{ $socile->link }}
                            </td>
                            <td>
                                <a href="{{ $socile->link }}" target="_blank" class="btn btn-success btn-sm" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('profile.socile.edit',$socile->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{ route('profile.socile.delete',$socile->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body m-auto">
                <h4 class="header-title text-center">{{ __('Socile Icon List') }}</h4>
                @php
                    $fonts = array(                             
                        'fa-twitter-square',                     
                        'fa-facebook-square',  
                        'fa-github-square', 
                        'fa-twitter',                            
                        'fa-facebook',                           
                        'fa-github',  
                        'fa-pinterest',                          
                        'fa-pinterest-square',                   
                        'fa-google-plus-square',                 
                        'fa-google-plus',  
                        'fa-linkedin',                           
                        'fa-undo',                               
                        'fa-gavel',                              
                        'fa-tachometer', 
                        'fa-github-alt',   
                        'fa-stack-overflow',                     
                        'fa-instagram',                          
                        'fa-flickr',  
                        'fa-skype',                              
                        'fa-foursquare', 
                        'fa-vk',
                        'fa-youtube-square',                     
                        'fa-youtube',                                
                    );
                @endphp
                <div class="my-5">
                    @foreach ( $fonts as $icon )
                        <button type="button" style="border: none" class="btn btn-info my-2"><i data-icon="{{ $icon }}" class="socile_btn {{ $icon }}" style="font-family: fontawesome; font-style:normal;"></i></button>
                    @endforeach

                    <form action="{{ route('socile_icon.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="mb-2 col-md-12">
                                <label for="" class="form-label">{{ __('Socile Icon') }}</label>
                                <input type="text" name="icon" class="form-control" id="icon" placeholder="Socile Icon">
                                @error('icon')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="" class="form-label">{{ __('Socile Link') }}</label>
                                <input type="text" name="link"  class="form-control" id="" placeholder="Socile Link">
                                @error('link')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
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

        @if(Session::has('delete'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ session('delete') }}");
        @endif

        @if(Session::has('store'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('store') }}");
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
    <script>
        $('.socile_btn').click(function(){
            var icon = $(this).attr('data-icon');
            $('#icon').attr('value',icon);
        })
    </script>
@endsection