@php
    $breads = Request::segments();
    array_pop($breads);
@endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}">Home</a>
        </li>
        @foreach ( $breads as $segment)
            <li class="breadcrumb-item active" aria-current="page">{{ ucwords($segment) }}</li>
        @endforeach
    </ol>
</nav>