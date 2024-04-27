@extends('frontend.layouts.master')
@section('content')
    <!-- section main content -->
<section class="main-content">
    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="row gy-4">
                    @forelse ( $latest_blogs as $latest )
                        <div class="col-sm-4">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="{{ route('category.item',$latest->rel_to_cat->id) }}" class="category-badge position-absolute">{{ $latest->rel_to_cat->category_name }}</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="{{ route('blog.single',$latest->id) }}">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/blog') }}/{{ $latest->image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="{{ route('personal.info',$latest->rel_to_user->id) }}">
                                            @if ($latest->rel_to_user->photo == null)
                                            <img src="{{ Avatar::create( $latest->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
                                            @else 
                                                <img src="{{ asset('uploads/user') }}/{{ $latest->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
                                            @endif
                                            {{ $latest->rel_to_user->name }}</a></li>
                                        <li class="list-inline-item">{{ $latest->created_at->format('Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('blog.single',$latest->id) }}">{{ Str::substr($latest->blog_title,0,45) }}</a></h5>
                                    <p class="excerpt mb-0">{{ Str::substr($latest->blog_title,0,100) }}</p>
                                </div>
                                <div class="post-bottom clearfix d-flex align-items-center">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/sharer.php?u={{url()->current()}}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a target="_blank" href="https://twitter.com/intent/tweet?url={{url()->current()}}"><i class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a target="_blank" href="http://pinterest.com/pin/create/button/?url={{url()->current()}}"><i class="fab fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="more-button float-end">
                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <h4 class="text-center">No Blog Found</h4>
                    @endforelse
                </div>
                {{ $latest_blogs->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
<!-- instagram feed -->
@include('frontend.include.instragam_post')
@endsection
