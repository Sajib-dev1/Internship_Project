@extends('layouts.admin')
@section('content')
@include('bladecompunet')
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
                                <a href="{{ route('user.profile.socile.edit',$socile->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{ route('user.profile.socile.delete',$socile->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

                    <form action="{{ route('user.socile_icon.store') }}" method="POST">
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
    $('.socile_btn').click(function(){
        var icon = $(this).attr('data-icon');
        $('#icon').attr('value',icon);
    })
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