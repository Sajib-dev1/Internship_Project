@extends('frontend.layouts.master')
@section('content')
<!-- hero section -->
<section id="hero">
    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-8">
                <!-- featured post large -->
                @if ($blog_info->count() != 0)
                @foreach ( $blog_info->take(1) as $blog )
                    <div class="post featured-post-lg">
                        <div class="details clearfix">
                            <a href="{{ route('category.item',$blog->rel_to_cat->id) }}" class="category-badge">{{ $blog->rel_to_cat->category_name }}</a>
                            <h2 class="post-title"><a href="{{ route('blog.single',$blog->id) }}">{{ Str::substr($blog->blog_title,0,70) }}</a></h2>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ route('personal.info',$blog->rel_to_user->id) }}">{{ $blog->rel_to_user->name }}</a></li>
                                <li class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
                            </ul>
                        </div>
                        <a href="{{ route('blog.single',$blog->id) }}">
                            <div class="thumb rounded">
                                <div class="inner data-bg-image"
                                    data-bg-image="{{ asset('uploads/blog') }}/{{ $blog->image }}"></div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @endif
            </div>
            <div class="col-lg-4">
                <!-- post tabs -->
                <div class="post-tabs rounded bordered">
                    <!-- tab navs -->
                    <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                        <li class="nav-item" role="presentation"><button aria-controls="popular"
                                aria-selected="true" class="nav-link active" data-bs-target="#popular"
                                data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button>
                        </li>
                        <li class="nav-item" role="presentation"><button aria-controls="recent"
                                aria-selected="false" class="nav-link" data-bs-target="#recent"
                                data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button>
                        </li>
                    </ul>
                    <!-- tab contents -->
                    <div class="tab-content" id="postsTabContent">
                        <!-- loader -->
                        <div class="lds-dual-ring"></div>
                        <!-- popular posts -->
                        <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                            role="tabpanel">
                            <!-- post -->
                            @foreach ( $popular_posts->take(4) as $populer )
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="{{ route('blog.single',$populer->rel_to_popu->id) }}">
                                            <div class="inner">
                                                    <img src="{{ asset('uploads/blog') }}/{{ $populer->rel_to_popu->image }}" class="populer_inage_user" alt=""> 
                                                
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('blog.single',$populer->rel_to_popu->id) }}">{{ Str::substr($populer->rel_to_popu->blog_title,0,45) }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $populer->rel_to_popu->created_at->format('d M Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- recent posts -->
                        <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                            <!-- post -->
                            @foreach ( $latest_blogs->take(4) as $resent_blog )
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="{{ route('blog.single',$resent_blog->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $resent_blog->image }}" class="populer_inage_user" alt=""> 
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('blog.single',$resent_blog->id) }}">{{ Str::substr($resent_blog->blog_title,0,45) }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $resent_blog->created_at->format('d M Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="section-header">
                    <h3 class="section-title">Editor’s Pick</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            <!-- post -->
                            @foreach ( $editor_blogs->take(1) as $editor_blog )
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="{{ route('category.item',$editor_blog->rel_to_cat->id) }}"
                                            class="category-badge position-absolute">{{ $editor_blog->rel_to_cat->category_name }}</a>
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('blog.single',$editor_blog->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $editor_blog->image }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        <li class="list-inline-item"><a href="{{ route('personal.info',$editor_blog->rel_to_user->id) }}">
                                            @if ($editor_blog->rel_to_user->photo == null)
											<img src="{{ Avatar::create( $editor_blog->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
											@else 
												<img src="{{ asset('uploads/user') }}/{{ $editor_blog->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
											@endif
                                            {{ $editor_blog->rel_to_user->name }}</a></li>
                                        <li class="list-inline-item">{{ $editor_blog->created_at->format('Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('blog.single',$editor_blog->id) }}">{{ Str::substr($editor_blog->blog_title,0,45) }}</a></h5>
                                    <p class="excerpt mb-0">{{ Str::substr($editor_blog->summary_blog,0,100) }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            <!-- post -->
                            @foreach ( $editor_list_blog->take(4) as $editor_blog )

                                <div class="post post-list-sm square">
                                    <div class="thumb rounded">
                                        <a href="{{ route('blog.single',$editor_blog->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $editor_blog->image }}"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('blog.single',$editor_blog->id) }}">{{ Str::substr($editor_blog->blog_title,0,45) }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $editor_blog->created_at->format('d M Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- horizontal ads -->
                <div class="ads-horizontal text-md-center">
                    <span class="ads-title">- Sponsored Ad -</span>
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('frontend') }}/images/ads/ad-750.png" alt="Advertisement" />
                    </a>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Trending</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            <!-- post large -->
                            {{-- @if ( $populer_count )
                                
                            @endif --}}
                            @foreach ( $tranding_blogs->take(1) as $tranding_blog )
                            
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="{{ route('category.item',$tranding_blog->rel_to_cat->id) }}" class="category-badge position-absolute">{{ $tranding_blog->rel_to_cat->category_name }}</a>
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('blog.single',$tranding_blog->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $tranding_blog->image }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('personal.info',$tranding_blog->rel_to_user->id) }}">
                                                @if ($tranding_blog->rel_to_user->photo == null)
                                                <img src="{{ Avatar::create( $tranding_blog->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
                                                @else 
                                                    <img src="{{ asset('uploads/user') }}/{{ $tranding_blog->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
                                                @endif
                                                {{ $tranding_blog->rel_to_user->name }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">{{ $tranding_blog->created_at->format('d M Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('blog.single',$tranding_blog->id) }}">{{  Str::substr($tranding_blog->blog_title,0,48) }}</a></h5>
                                    <p class="excerpt mb-0">{{  Str::substr($tranding_blog->summary_blog,0,100) }}</p>
                                </div>
                            @endforeach
                                @foreach ($tranding_blogs2->take(2) as $trand )
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{ route('blog.single',$tranding_blog->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $trand->image }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('blog.single',$trand->id) }}">{{  Str::substr($trand->blog_title,0,30) }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $trand->created_at->format('d M Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                            <!-- post -->
                        
                        <div class="col-sm-6">
                            <!-- post large -->
                            @foreach ( $tranding_blogs3->take(1) as $tranding )
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="{{ route('category.item',$tranding->rel_to_cat->id) }}" class="category-badge position-absolute">Inspiration</a>
                                    <span class="post-format">
                                        <i class="icon-earphones"></i>
                                    </span>
                                    <a href="{{ route('blog.single',$tranding_blog->id) }}">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/blog') }}/{{ $tranding->image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item">
                                        <a href="{{ route('personal.info',$tranding->rel_to_user->id) }}">
                                            @if ($tranding->rel_to_user->photo == null)
                                            <img src="{{ Avatar::create( $tranding->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
                                            @else 
                                                <img src="{{ asset('uploads/user') }}/{{ $tranding->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
                                            @endif
                                            {{ $tranding->rel_to_user->name }}
                                        </a>
                                    </li>
                                    <li class="list-inline-item">{{ $tranding->created_at->format('d M Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('blog.single',$tranding->id) }}">{{  Str::substr($tranding->blog_title,0,48) }}</a></h5>
                                <p class="excerpt mb-0">{{  Str::substr($tranding->summary_blog,0,100) }}</p>
                            </div>
                            @endforeach
                            <!-- post -->
                            @foreach ( $tranding_blogs4->take(2) as $tranding )
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{ route('blog.single',$tranding->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $tranding->image }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('blog.single',$tranding->id) }}">{{  Str::substr($tranding->blog_title,0,30) }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $tranding->created_at->format('d M Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Inspiration</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                    <div class="slick-arrows-top">
                        <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                            aria-label="Previous"><i class="icon-arrow-left"></i></button>
                        <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                            aria-label="Next"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>

                <div class="row post-carousel-twoCol post-carousel">
                    <!-- post -->
                    @foreach ( $inspiration_blogs as $inspiration )
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="{{ route('category.item',$inspiration->rel_to_cat->id) }}" class="category-badge">{{ $inspiration->rel_to_cat->category_name }}</a>
                                <h4 class="post-title"><a href="{{ route('blog.single',$inspiration->id) }}">{{ Str::substr($inspiration->blog_title,0,45) }}</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="{{ route('personal.info',$inspiration->rel_to_user->id) }}">{{ $inspiration->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $inspiration->created_at->format('d M Y') }}</li>
                                </ul>
                            </div>
                            <a href="{{ route('blog.single',$inspiration->id) }}">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="{{ asset('uploads/blog') }}/{{ $inspiration->image }}"
                                            alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Latest Posts</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">

                    <div class="row">
                        @foreach ( $latest_blogs->take(4) as $latest )
                            <div class="col-md-12 col-sm-6">
                                <!-- post -->
                                <div class="post post-list clearfix">
                                    <div class="thumb rounded">
                                        <span class="post-format-sm">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('blog.single',$latest->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog') }}/{{ $latest->image }}"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-3">
                                            <li class="list-inline-item"><a href="{{ route('personal.info',$latest->rel_to_user->id) }}">
                                                @if ($latest->rel_to_user->photo == null)
                                                <img src="{{ Avatar::create( $latest->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
                                                @else 
                                                    <img src="{{ asset('uploads/user') }}/{{ $latest->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
                                                @endif
                                                {{ $latest->rel_to_user->name }}</a></li>
                                            <li class="list-inline-item"><a href="{{ route('category.item',$latest->rel_to_cat->id) }}">{{ $latest->rel_to_cat->category_name }}</a></li>
                                            <li class="list-inline-item">{{ $latest->created_at->format('Y') }}</li>
                                        </ul>
                                        <h5 class="post-title"><a href="{{ route('blog.single',$latest->id) }}">{{ Str::substr($latest->blog_title,0,45) }}</a></h5>
                                        <p class="excerpt mb-0">{{ Str::substr($latest->summary_blog,0,100) }}</p>

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
                            </div>
                        @endforeach

                    </div>
                    <!-- load more button -->
                    <div class="text-center">
                        <a href="{{ route('loadmore.store') }}" class="btn btn-simple">Load More</a>
                    </div>
                </div>

            </div>
            @include('frontend.include.admin_main_right')

        </div>

    </div>
</section>
@include('frontend.include.instragam_post')
@endsection
@section('footer_script')
    @if(session('success'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif
@endsection