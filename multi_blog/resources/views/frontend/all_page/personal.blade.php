@extends('frontend.layouts.master')
@section('content')
	<!-- header -->
	<header class="header-personal">
        <div class="container-xl header-top">
			<div class="row align-items-center">

				<div class="col-4 d-none d-md-block d-lg-block">
					<!-- social icons -->

				</div>

				<div class="col-md-4 col-sm-12 col-xs-12 text-center">
				<!-- site logo -->
					<a class="navbar-brand" href="{{ route('personal.info',$personal_user_info->id) }}">
						@if ($personal_user_info->photo == null)
						<img src="{{ Avatar::create( $personal_user_info->name )->toBase64() }}" class="person_image_photo" />
						@else 
							<img src="{{ asset('uploads/user') }}/{{ $personal_user_info->photo }}" class="person_image_photo" alt=""> 
						@endif
					</a>
					<a href="{{ route('personal.info',$personal_user_info->id) }}" class="d-block text-logo">{{ $personal_user_info->name }}<span class="dot">.</span></a>
					<span class="slogan d-block">{{ $personal_user_info->profetion }}</span>
					<ul class="social-icons list-unstyled list-inline mb-0 mt-4">
						@foreach ($personal_socile_icons as $personal_socile )
						<li class="list-inline-item"><a href="{{ $personal_socile->link }}" target="_blank"><i class="{{ $personal_socile->icon }}"></i></a></li>
						@endforeach
					</ul>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">

				</div>

			</div>
        </div>

		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				
				<div class="collapse navbar-collapse justify-content-center centered-nav">
					<!-- menus -->
				</div>

			</div>
		</nav>
	</header>
<section class="hero-carousel">
	<div class="row post-carousel-featured post-carousel">
		<!-- post -->
		@foreach ( $blogs as $blog )
		@php
			$cat_name = Str::lower($blog->rel_to_cat->category_name);
		@endphp
			<div class="post featured-post-md">
				<div class="details clearfix">
					<a href="{{ route('category.item',$blog->rel_to_cat->id) }}" class="category-badge">{{ $blog->rel_to_cat->category_name }}</a>
					<h4 class="post-title"><a href="{{ route('blog.single',$blog->id) }}">{{ $blog->blog_title }}</a></h4>
					<ul class="meta list-inline mb-0">
						<li class="list-inline-item"><a href="{{ route('personal.info',$blog->rel_to_user->id) }}">{{ $blog->rel_to_user->name }}</a></li>
						<li class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
					</ul>
				</div>
				<a href="{{ route('blog.single',$blog->id) }}">
					<div class="thumb rounded">
						<div class="inner data-bg-image" data-bg-image="{{ asset('uploads/blog') }}/{{ $blog->image }}"></div>
					</div>
				</a>
			</div>
		@endforeach
	</div>
</section>

<!-- section main content -->
<section class="main-content">
	<div class="container-xl">

		<div class="row gy-4">

			<div class="col-lg-8">

				<div class="row gy-4">
					@foreach ( $blogs->take(10) as $blog )
					@php
						$cat_name = Str::lower($blog->rel_to_cat->category_name);
					@endphp
						<div class="col-sm-6">
							<!-- post -->
							<div class="post post-grid rounded bordered">
								<div class="thumb top-rounded">
									<a href="{{ route('category.item',$blog->rel_to_cat->id) }}" class="category-badge position-absolute">{{ $blog->rel_to_cat->category_name }}</a>
									<span class="post-format">
										<i class="icon-picture"></i>
									</span>
									<a href="{{ route('blog.single',$blog->id) }}">
										<div class="inner">
											<img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="post-title" />
										</div>
									</a>
								</div>
								<div class="details">
									<ul class="meta list-inline mb-0">
										<li class="list-inline-item"><a href="{{ route('personal.info',$blog->rel_to_user->id) }}">
											@if ($blog->rel_to_user->photo == null)
											<img src="{{ Avatar::create( $blog->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
											@else 
												<img src="{{ asset('uploads/user') }}/{{ $blog->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
											@endif
											{{ $blog->rel_to_user->name }}
										</a></li>
										<li class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{ route('blog.single',$blog->id) }}">{{ Str::substr($blog->blog_title,0,45) }}</a></h5>
									<p class="excerpt mb-0">{{ Str::substr($blog->summary_blog,0,100) }}</p>
								</div>
								<div class="post-bottom clearfix d-flex align-items-center">
									<div class="social-share me-auto">
										<button class="toggle-button icon-share"></button>
										<ul class="icons list-unstyled list-inline mb-0">
											<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
										</ul>
									</div>
									<div class="more-button float-end">
										<a href="blog-single.html"><span class="icon-options"></span></a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>

				<nav>
					<ul class="pagination justify-content-center">
						<li class="page-item active" aria-current="page">
							<span class="page-link">1</span>
						</li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
					</ul>
				</nav>

			</div>
			@include('frontend.include.admin_main_right')

		</div>

	</div>
</section>

<!-- instagram feed -->
@include('frontend.include.instragam_post')
@endsection