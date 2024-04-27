@extends('admin.auth.layout')
@section('content')
    <div class="row">
        <div class="col-xl-6 m-auto">
            <div class="card">
                <div class="card-body m-auto">
                    <h4 class="header-title text-center">{{ __('Socile Icon List') }}</h4>
                    @php
                        $fonts = array(                             
                            'fab fa-twitter',
                            'fab fa-facebook-f',
                            'fab fa-facebook-square',
                            'fab fa-instagram-square', 
                            'fab fa-github-square',
                            'fab fa-github-alt',
                            'fab fa-github',
                            'fab fa-pinterest-square',
                            'fab fa-pinterest-p',
                            'fab fa-youtube', 
                            'fab fa-youtube-square', 
                            'fab fa-linkedin-in', 
                            'fab fa-linkedin',                            
                        );
                    @endphp
                    <div class="my-5">
                        @foreach ( $fonts as $icon )
                            <button type="button" style="border: none" class="btn btn-info my-2"><i data-icon="{{ $icon }}" class="socile_btn {{ $icon }}" style="font-family: fontawesome; font-style:normal; font-size:20px"></i></button>
                        @endforeach
    
                        <form action="{{ route('admin.socile.icon.update') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="mb-2 col-md-12">
                                    <label for="" class="form-label">{{ __('Socile Icon') }}</label>
                                    <input type="text" name="icon" class="form-control" id="icon" placeholder="Socile Icon" value="{{ $socile_info->icon }}">
                                    @error('icon')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-12">
                                    <label for="" class="form-label">{{ __('Socile Link') }}</label>
                                    <input type="text" name="link"  class="form-control" id="" placeholder="Socile Link" value="{{ $socile_info->link }}">
                                    @error('link')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('admin.socile.icon') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
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
    $('.socile_btn').click(function(){
        var icon = $(this).attr('data-icon');
        $('#icon').attr('value',icon);
    })
</script>  
@endsection