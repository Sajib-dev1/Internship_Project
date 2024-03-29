@extends('frontend.master')
@section('content')
    	<!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Inspiration</a></li>
                    <li class="breadcrumb-item active" aria-current="page">3 Easy Ways To Make Your iPhone Faster</li>
                </ol>
            </nav>

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post header -->
						<div class="post-header">
							<h1 class="title mt-0 mb-3">{{ $blog_info->blog_title }}</h1>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item image_small"><a href="#"><img width="30" src="{{ asset('uploads/user') }}/{{ $blog_info->rel_to_user->photo }}" class="author" alt="author"/>Katen Doe</a></li>
								<li class="list-inline-item"><a href="#">{{ $blog_info->rel_to_cat->category_name }}</a></li>
								<li class="list-inline-item">{{ $blog_info->created_at->format('d M Y') }}</li>
							</ul>
						</div>
						<!-- featured image -->
						<div class="featured-image">
							<img src="{{ asset('uploads/blog') }}/{{ $blog_info->image }}" alt="post-title" />
						</div>
						<!-- post content -->
						<div class="post-content clearfix">
                            {!! $blog_info->blog_des !!}

							<h4>{{ $blog_info->summary_title }}</h4>
                            @php
                            $after_exploads = explode(',',$blog_info->field_name); 
                            $after_expload_tags = explode(',',$blog_info->tag); 
                            @endphp

							<ul>
                                @foreach ( $after_exploads as $list )
                                <li>{{ $list }}</li>
                                @endforeach
								
							</ul>

							<p>{{ $blog_info->summary_blog }}</p>
						</div>
						<!-- post bottom section -->
						<div class="post-bottom">
							<div class="row d-flex align-items-center">
								<div class="col-md-6 col-12 text-center text-md-start">
									<!-- tags -->
                                    @foreach ( $after_expload_tags as $tag )
                                        <a href="#" class="tag">#{{ App\Models\Tag::find($tag)->tag_name }}</a>
                                    @endforeach
									
								</div>
								<div class="col-md-6 col-12">
									<!-- social icons -->
									<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
										<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
							<img src="{{ asset('uploads/user') }}/{{ $blog_info->rel_to_user->photo }}" alt="Katen Doe" />
						</div>
						<div class="details">
							<h4 class="name"><a href="#">{{ $blog_info->rel_to_user->name }}</a></h4>
							<p>{{ $blog_info->rel_to_user->about }}</p>
							<!-- social icons -->
							<ul class="social-icons list-unstyled list-inline mb-0">
								<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Comments (3)</h3>
						<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded">

						<ul class="comments">
							<!-- comment item -->
							<li class="comment rounded">
								<div class="thumb">
									<img src="{{ asset('frontend') }}/images/other/comment-1.png" alt="John Doe" />
								</div>
								<div class="details">
									<h4 class="name"><a href="#">John Doe</a></h4>
									<span class="date">Jan 08, 2021 14:41 pm</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae odio ut tortor fringilla cursus sed quis odio.</p>
									<a href="#" class="btn btn-default btn-sm">Reply</a>
								</div>
							</li>
							<!-- comment item -->
							<li class="comment child rounded">
								<div class="thumb">
									<img src="{{ asset('frontend') }}/images/other/comment-2.png" alt="John Doe" />
								</div>
								<div class="details">
									<h4 class="name"><a href="#">Helen Doe</a></h4>
									<span class="date">Jan 08, 2021 14:41 pm</span>
									<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
									<a href="#" class="btn btn-default btn-sm">Reply</a>
								</div>
							</li>
							<!-- comment item -->
							<li class="comment rounded">
								<div class="thumb">
									<img src="{{ asset('frontend') }}/images/other/comment-3.png" alt="John Doe" />
								</div>
								<div class="details">
									<h4 class="name"><a href="#">Anna Doe</a></h4>
									<span class="date">Jan 08, 2021 14:41 pm</span>
									<p>Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
									<a href="#" class="btn btn-default btn-sm">Reply</a>
								</div>
							</li>
						</ul>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30">

						<form id="comment-form" class="comment-form" method="post">
				
							<div class="messages"></div>
							
							<div class="row">

								<div class="column col-md-12">
									<!-- Comment textarea -->
									<div class="form-group">
										<textarea name="InputComment" id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required"></textarea>
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Email input -->
									<div class="form-group">
										<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email address" required="required">
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Name input -->
									<div class="form-group">
										<input type="text" class="form-control" name="InputWeb" id="InputWeb" placeholder="Website" required="required">
									</div>
								</div>
	
								<div class="column col-md-12">
									<!-- Email input -->
									<div class="form-group">
										<input type="text" class="form-control" id="InputName" name="InputName" placeholder="Your name" required="required">
									</div>
								</div>
						
							</div>
	
							<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->
	
						</form>
					</div>
                </div>

				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('frontend') }}/images/map-bg.png">
								<img src="{{ asset('frontend') }}/images/logo.svg" alt="logo" class="mb-4" />
								<p class="mb-4">{{ $blog_info->rel_to_user->about }}</p>
								<ul class="social-icons list-unstyled list-inline mb-0">
									<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
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
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<span class="number">1</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="{{ asset('frontend') }}/images/posts/tabs-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<span class="number">2</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="{{ asset('frontend') }}/images/posts/tabs-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<span class="number">3</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="{{ asset('frontend') }}/images/posts/tabs-3.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
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
									    <li><a href="#">{{ $category->category_name }}</a><span>(5)</span></li>
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
								<span class="newsletter-headline text-center mb-3">Join {{ $subscriber }} subscribers!</span>
								<form action="{{ route('subscriber.store') }}" method="POST">
									@csrf
									<div class="mb-2">
										<input class="form-control w-100 text-center" name="email" required placeholder="Email address…" type="email">
										@error('email')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<button class="btn btn-default btn-full" type="submit">Sign Up</button>
								</form>
								<span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="{{ route('register') }}">Privacy Policy</a></span>
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
                                    @foreach ($blogs as $blog )
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="category.html" class="category-badge position-absolute">{{ $blog->rel_to_cat->category_name }}</a>
                                                <a href="{{ route('blog.sngle',$blog->id) }}">
                                                    <div class="inner">
                                                        <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="post-title" />
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4"><a href="{{ route('blog.sngle',$blog->id) }}">{{ $blog->blog_title }}</a></h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item"><a href="#">{{ $blog->rel_to_user->name }}</a></li>
                                                <li class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                    @endforeach
									<!-- post -->
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
								    <a href="#" class="tag">#{{ $tag->tag_name }}</a>  
                                @endforeach
							</div>		
						</div>

					</div>

				</div>

			</div>

		</div>
	</section>

	<!-- instagram feed -->
	<div class="instagram">
		<div class="container-xl">
			<!-- button -->
			<a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
			<!-- images -->
			<div class="instagram-feed d-flex flex-wrap">
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-1.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-2.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-3.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-4.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-5.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="#">
						<img src="{{ asset('frontend') }}/images/insta/insta-6.jpg" alt="insta-title" />
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection