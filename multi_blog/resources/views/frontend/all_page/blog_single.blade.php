@extends('frontend.layouts.master')
@section('content')
	<!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">
			@include('frontend.include.blade_componets')

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post header -->
						<div class="post-header">
							<h1 class="title mt-0 mb-3">{{ $blog_single->blog_title }}</h1>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="{{ route('personal.info',$blog_single->rel_to_user->id) }}">
									@if ($blog_single->rel_to_user->photo == null)
									<img src="{{ Avatar::create( $blog_single->rel_to_user->name )->toBase64() }}" class="author user_photo_per" />
									@else 
										<img src="{{ asset('uploads/user') }}/{{ $blog_single->rel_to_user->photo }}" class="author user_photo_per" alt=""> 
									@endif
									{{ $blog_single->rel_to_user->name }}</a></li>
								<li class="list-inline-item"><a href="{{ route('category.item',$blog_single->rel_to_cat->id) }}">{{ $blog_single->rel_to_cat->category_name }}</a></li>
								<li class="list-inline-item">{{ $blog_single->created_at->format('d M Y') }}</li>
							</ul>
						</div>
						<!-- featured image -->
						<div class="featured-image">
							<img src="{{ asset('uploads/blog') }}/{{ $blog_single->image }}" alt="post-title" />
						</div>
						<!-- post content -->
						<div class="post-content clearfix">
							{!! $blog_single->blog_des !!}

							<h4>{{ $blog_single->summary_title }}</h4>
							@php
								$after_explode = explode(',',$blog_single->field_name);
								$after_explode_tag = explode(',',$blog_single->tag);
							@endphp

							<ul>
								@foreach ( $after_explode as $list_item )
								<li>{{ $list_item }}</li>
								@endforeach
							</ul>

							<p>{{ $blog_single->summary_blog }}</p>
						</div>
						
						<!-- post bottom section -->
						<div class="post-bottom">
							<div class="row d-flex align-items-center">
								<div class="col-md-6 col-12 text-center text-md-start">
									<!-- tags -->
									@foreach ( $after_explode_tag as $after_tag )
									<a href="{{ route('tag.blog',$blog_single->id) }}" class="tag">#{{ App\Models\Tag::find($after_tag)->tag_name }}</a>
										
									@endforeach
								</div>
								<div class="col-md-6 col-12">
									<!-- social icons -->
									<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
										<li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/sharer.php?u={{url()->current()}}"><i class="fab fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a target="_blank" href="https://twitter.com/intent/tweet?url={{url()->current()}}"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a target="_blank" href="http://pinterest.com/pin/create/button/?url={{url()->current()}}"><i class="fab fa-pinterest"></i></a></li>
										<li class="list-inline-item"><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
							@if ($personal_user_info->photo == null)
							<img src="{{ Avatar::create( $personal_user_info->name )->toBase64() }}" class="person_image_photo" />
							@else 
								<img src="{{ asset('uploads/user') }}/{{ $personal_user_info->photo }}" class="person_image_photo" alt=""> 
							@endif
						</div>
						<div class="details">
							<h4 class="name"><a href="{{ route('personal.info',$blog_single->rel_to_user->id) }}">{{ $blog_single->rel_to_user->name }}</a></h4>
							<p>{{ $blog_single->rel_to_user->about }}</p>
							<!-- social icons -->
							<ul class="social-icons list-unstyled list-inline mb-0">
								@foreach ($personal_socile_icons as $personal_socile )
								<li class="list-inline-item"><a href="{{ $personal_socile->link }}" target="_blank"><i class="{{ $personal_socile->icon }}"></i></a></li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						@php
							$commnt = 'Comment';
						@endphp
						<h3 class="section-title">{{ $comments->count() >1 ? Str::plural($commnt):$commnt }} ({{ $comments->count() }})</h3>
						<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded">
						<ul class="comments">
							<!-- comment item -->
							@foreach ( $comments as $comment )
								<li class="comment rounded">
									<div class="thumb">
										@if ($comment->rel_to_user->photo == null)
										<img src="{{ Avatar::create( $comment->rel_to_user->name )->toBase64() }}" class="author populer_inage_user" />
										@else 
											<img src="{{ asset('uploads/user') }}/{{ $comment->rel_to_user->photo }}" class="author populer_inage_user" alt=""> 
										@endif
									</div>
									<div class="details">
										<h4 class="name"><a href="#">{{ $comment->rel_to_user->name }}</a></h4>
										<span class="date">{{ $comment->created_at->toDayDateTimeString() }}</span>
										<p>{{ $comment->comment }}</p>
										@auth
										<a href="#replay_form" data-parent="{{ $comment->id }}" data-name="{{ $comment->rel_to_user->name }}" class="btn btn-default btn-sm btn-replay">Reply</a>
										@endauth
									</div>
								</li>
								@foreach ( $comment->replies as $replay )
									<li class="comment child rounded">
										<div class="thumb">
											@if ($replay->rel_to_user->photo == null)
											<img src="{{ Avatar::create( $replay->rel_to_user->name )->toBase64() }}" class="author populer_inage_user" />
											@else 
												<img src="{{ asset('uploads/user') }}/{{ $replay->rel_to_user->photo }}" class="author populer_inage_user" alt=""> 
											@endif
										</div>
										<div class="details">
											<h4 class="name"><a href="#">{{ $replay->rel_to_user->name }}</a></h4>
											<span class="date">{{ $replay->created_at->toDayDateTimeString() }}</span>
											<p>{{ $replay->comment }}</p>
											<a href="#replay_form" data-parent="{{ $replay->parent_id }}" data-name="{{ $replay->rel_to_user->name }}" data-replay-id="{{ $replay->id }}" class="btn btn-default btn-sm btn-replay">Reply</a>
										</div>
									</li>
										@foreach (App\Models\Comment::where('parent_id',$replay->id)->get() as $replay_comments )
											<li class="comment child rounded" style="margin-left: 120px">
												<div class="thumb">
													@if ($replay_comments->rel_to_user->photo == null)
													<img src="{{ Avatar::create( $replay_comments->rel_to_user->name )->toBase64() }}" class="author populer_inage_user" />
													@else 
														<img src="{{ asset('uploads/user') }}/{{ $replay_comments->rel_to_user->photo }}" class="author populer_inage_user" alt=""> 
													@endif
												</div>
												<div class="details">
													<h4 class="name"><a href="#">{{ $replay_comments->rel_to_user->name }}</a></h4>
													<span class="date">{{ $replay_comments->created_at->toDayDateTimeString() }}</span>
													<p>{{ $replay_comments->comment }}</p>
													<a href="#replay_form" data-parent="{{ $replay_comments->parent_id }}" data-name="{{ $replay_comments->rel_to_user->name }}" data-replay-id="{{ $replay->id }}" class="btn btn-default btn-sm btn-replay">Reply</a>
												</div>
											</li>
										@endforeach
								@endforeach
							@endforeach
							<!-- comment item -->
							
						</ul>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- comment form -->
					@auth
						<div class="comment-form rounded bordered padding-30" id="replay_form">

							<form id="comment-form" action="{{ route('comment.store') }}" class="comment-form" method="post">
								@csrf
					
								<div class="messages"></div>
								
								<div class="row">
								<input type="hidden" name="blog_id" value="{{ $blog_single->id }}">
								<input type="hidden" name="bloger_id" value="{{ $blog_single->rel_to_user->id }}">
								<input type="hidden" name="parent_id" id="parent_replay">

									<div class="column col-md-12">
										<!-- Comment textarea -->
										<div class="form-group">
											<textarea name="comment" id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required"></textarea>
										</div>
									</div>
									@error('comment')
										<strong class="text-danger">{{ $message }}</strong>
									@enderror
							
								</div>
		
								<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->
		
							</form>
						</div>
						@else
						<div class="alert alert-info" style="border-radius: 10px;">
							<h5>Please Login to live a comment <a href="{{ route('login') }}" style="text-decoration:underline"> Login here</a></h5>
						</div>
					@endauth
                </div>
				@include('frontend.include.admin_main_right')

			</div>

		</div>
	</section>

	<!-- instagram feed -->
	{{-- @include('frontend.include.instragam_post') --}}
@endsection
@section('footer_script')
	<script>
		$('.btn-replay').click(function(){
			var parent_id = $(this).attr('data-parent');
			$('#parent_replay').attr('value',parent_id);
		});

		$('.btn-replay').click(function(){
			var parent_id = $(this).attr('data-replay-id');
			$('#parent_replay').attr('value',parent_id);
		});
	</script>
	<script>
		$('.btn-replay').click(function(){
			var replay_id = $(this).attr('data-name');
			$('#InputComment').html(replay_id).css('font-weight','bold');
		});
	</script>
@endsection