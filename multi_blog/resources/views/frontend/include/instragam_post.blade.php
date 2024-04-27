<!-- instagram feed -->
<div class="instagram">
    <div class="container-xl">
        <!-- button -->
        <a href="{{ route('index') }}" class="btn btn-default btn-instagram">@Sajib on Instagram</a>
        <!-- {{ asset('frontend') }}/images -->
        <div class="instagram-feed d-flex flex-wrap">
            @foreach ( $instragams->take(6) as $instragam )
                <div class="insta-item col-sm-2 col-6 col-md-2">
                    <a href="{{ $instragam->link }}" target="_blank">
                        <img src="{{ asset('uploads/instragram/') }}/{{ $instragam->image }}" alt="insta-title" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>