<div class="col-lg-4">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- widget about -->
        <div class="widget rounded">
            <div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('frontend') }}/images/map-bg.png">
                <img src="{{ asset('uploads/logo') }}/{{ App\Models\FrontendLogo::first()->logo }}" alt="logo" class="mb-4" />
                <p class="mb-4">{{ App\Models\Admin::first()->about }}</p>
                <ul class="social-icons list-unstyled list-inline mb-0">
                    @include('frontend.include.admin_home_icon')
                </ul>
            </div>
        </div>

        <!-- widget popular posts -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Popular Posts</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <!-- post -->
                @foreach ( $popular_posts->take(3) as $popular ) 
                <div class="post post-list-sm circle">
                    <div class="thumb circle">
                        <span class="number">{{ $popular->sum }}</span>
                        <a href="blog-single.html">
                            <div class="inner">
                                <img src="{{ asset('uploads/blog') }}/{{ $popular->rel_to_popu->image }}" class="populer_inage_user" alt="post-title" />
                            </div>
                        </a>
                    </div>
                    <div class="details clearfix">
                        <h6 class="post-title my-0"><a href="{{ route('blog.single',$popular->rel_to_popu->id) }}">{{ Str::substr($popular->rel_to_popu->blog_title,0,45) }}</a></h6>
                        <ul class="meta list-inline mt-1 mb-0">
                            <li class="list-inline-item">{{ $popular->rel_to_popu->created_at->format('d M Y') }}</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>		
        </div>

        <!-- widget categories -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Explore Topics</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <ul class="list">
                    @foreach ( $categories as $category )
                    @php
                        $count_category = App\Models\Blog::where('category',$category->id)->count();
                    @endphp
                        <li><a href="{{  route('category.item',$category->id) }}">{{ $category->category_name }}</a><span>({{ $count_category }})</span></li>
                    @endforeach
                </ul>
            </div>
            
        </div>

        <!-- widget newsletter -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Newsletter</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <span class="newsletter-headline text-center mb-3">Join {{ App\Models\Subscriber::count() }} subscribers!</span>
                <form action="{{ route('subscribe.store') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <input class="form-control w-100 text-center" name="email" placeholder="Email address…" type="email">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                </form>
                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
            </div>		
        </div>

        <!-- widget post carousel -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Celebration</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <div class="post-carousel-widget">
                    <!-- post -->
                    @foreach ( $blogs as $blog )
                        <div class="post post-carousel">
                            <div class="thumb rounded">
                                <a href="{{ route('category.item',$blog->rel_to_cat->id) }}" class="category-badge position-absolute">{{ $blog->rel_to_cat->category_name }}</a>
                                <a href="{{ route('blog.single',$blog->id) }}">
                                    <div class="inner">
                                        <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <h5 class="post-title mb-0 mt-4"><a href="{{ route('blog.single',$blog->id) }}">{{ $blog->blog_title }}</a></h5>
                            <ul class="meta list-inline mt-2 mb-0">
                                <li class="list-inline-item"><a href="{{ route('personal.info',$blog->rel_to_user->id) }}">{{ $blog->rel_to_user->name }}</a></li>
                                <li class="list-inline-item">{{ $blog->created_at->format("d M Y") }}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
                <!-- carousel arrows -->
                <div class="slick-arrows-bot">
                    <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                    <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>		
        </div>

        <!-- widget advertisement -->
        <div class="widget no-container rounded text-md-center">
            <span class="ads-title">- Sponsored Ad -</span>
            <a href="{{ route('index') }}" class="widget-ads">
                <img src="{{ asset('frontend') }}/images/ads/ad-360.png" alt="Advertisement" />	
            </a>
        </div>

        <!-- widget tags -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Tag Clouds</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                @foreach ( $tags as $tag )
                <a href="{{ route('tag.blog',$tag->id) }}" value="{{ $tag->id }}" class="btn-tag">#{{ $tag->tag_name }}</a>
                @endforeach
            </div>		
        </div>
    </div>
</div>