@extends('layouts.admin')
@section('content')
@include('bladecompunet')
<div class="row">
    <div class="col-xl-8 m-auto">
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

                    <form action="{{ route('profile.socile_icon.update',$profile_info->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="mb-2 col-md-12">
                                <label for="" class="form-label">{{ __('Socile Icon') }}</label>
                                <input type="text" name="icon" class="form-control" id="icon" placeholder="Socile Icon Class" value="{{ $profile_info->icon }}">
                                @error('icon')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="" class="form-label">{{ __('Socile Link') }}</label>
                                <input type="text" name="link"  class="form-control" id="" placeholder="Socile Link" value="{{ $profile_info->link }}">
                                @error('link')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('user.profile') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
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

        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.success("{{ session('updated') }}");
        @endif
    </script>
    <script>
        $('.socile_btn').click(function(){
            var icon = $(this).attr('data-icon');
            $('#icon').attr('value',icon);
        })
    </script>
@endsection