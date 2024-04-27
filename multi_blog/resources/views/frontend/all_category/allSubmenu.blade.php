@extends('frontend.layouts.master')
@section('content')
<section class="page-header">
	<div class="container-xl">
		<div class="text-center">
			<h1 class="mt-0 mb-2">{{ $submenu_info->sub_menu }}</h1>
			@include('frontend.include.blade_componets')
		</div>
	</div>
</section>

<!-- section main content -->
<section class="main-content">
	<div class="container-xl">

		<div class="row gy-4">

			<div class="col-lg-8">

				<div class="row gy-4">

                    @forelse ( $blog_cats->take(10) as $blog )
						<div class="col-sm-6">
							<!-- post -->
							<input type="hidden" class="category_id_attr" value="{{ $blog->rel_to_cat->id }}">
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
										<li class="list-inline-item">
											<a href="{{ route('blog.single',$blog->id) }}">
												@if ($blog->rel_to_user->photo == null)
												<img src="{{ Avatar::create( $blog->rel_to_user->name )->toBase64() }}" class="user_photo_per" />
												@else 
													<img src="{{ asset('uploads/user') }}/{{ $blog->rel_to_user->photo }}" class="user_photo_per" alt=""> 
												@endif
												{{ $blog->rel_to_user->name }}
											</a>
										</li>
										<li class="list-inline-item">{{ $blog->created_at->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{ route('blog.single',$blog->id) }}">{{ Str::substr($blog->blog_title,0,45) }}</a></h5>
									<p class="excerpt mb-0">{{ Str::substr($blog->summary_blog,0,100) }}</p>
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
										<a href="{{ route('blog.single',$blog->id) }}"><span class="icon-options"></span></a>
									</div>
								</div>
							</div>
						</div>
						@empty
							<div class="text-center">Not abable this blog</div>
                    @endforelse
				</div>
				{{ $blog_cats->links('vendor.pagination.bootstrap-5') }}

			</div>
            @include('frontend.include.admin_main_right')

		</div>

	</div>
</section>

<!-- instagram feed -->
@include('frontend.include.instragam_post')
@endsection
@section('footer_script')
<script>
	$('.btn-tag').click(function(){
		let cat_id = $('.category_id_attr').val();
		let teg = $(this).val();
		let link = "{{ url('allSubmenu') }}"+"?btn-tag="+tag;
		alert(link);
	})
</script>
@endsection