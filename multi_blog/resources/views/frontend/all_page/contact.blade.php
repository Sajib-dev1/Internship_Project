@extends('frontend.layouts.master')
@section('content')
	<!-- page header -->
	<section class="page-header">
		<div class="container-xl">
			<div class="text-center">
				<h1 class="mt-0 mb-2">Contact</h1>
				@include('frontend.include.blade_componets')
			</div>
		</div>
	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row">
						
				<div class="col-md-4">
					<!-- contact info item -->
					<div class="contact-item bordered rounded d-flex align-items-center">
						<span class="icon icon-phone"></span>
						<div class="details">
							<h3 class="mb-0 mt-0">Phone</h3>
							<p class="mb-0">{{ App\Models\Admin::first()->phone }}</p>
						</div>
					</div>
					<div class="spacer d-md-none d-lg-none" data-height="30"></div>
				</div>

				<div class="col-md-4">
					<!-- contact info item -->
					<div class="contact-item bordered rounded d-flex align-items-center">
						<span class="icon icon-envelope-open"></span>
						<div class="details">
							<h3 class="mb-0 mt-0">E-Mail</h3>
							<p class="mb-0">{{ App\Models\Admin::first()->email }}</p>
						</div>
					</div>
					<div class="spacer d-md-none d-lg-none" data-height="30"></div>
				</div>

				<div class="col-md-4">
					<!-- contact info item -->
					<div class="contact-item bordered rounded d-flex align-items-center">
						<span class="icon icon-map"></span>
						<div class="details">
							<h3 class="mb-0 mt-0">Location</h3>
							{{--  --}}
							<p class="mb-0">{{ App\Models\Admin::first()->rel_to_country->name}} ,
								@if ( App\Models\Admin::first()->city != null )
									{{ App\Models\Admin::first()->rel_to_city->name }}
								@endif 
							</p>
						</div>
					</div>
				</div>

			</div>

			<div class="spacer" data-height="50"></div>

			<!-- section header -->
			<div class="section-header">
				<h3 class="section-title">Send Message</h3>
				<img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
			</div>

			<!-- Contact Form -->
			<form action="{{ route('input.user.store') }}" id="contact-form" class="contact-form" method="post">
				@csrf
				
				<div class="messages"></div>
				
				<div class="row">
					<div class="column col-md-6">
						<!-- Name input -->
						<div class="form-group">
							<input type="text" class="form-control" name="inputname" id="InputName" placeholder="Your name" required="required" data-error="Name is required.">
							<div class="help-block with-errors"></div>
							@error('inputname')
								<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
					</div>
					
					<div class="column col-md-6">
						<!-- Email input -->
						<div class="form-group">
							<input type="email" class="form-control" id="inputemail" name="inputemail" placeholder="Email address" required="required" data-error="Email is required.">
							<div class="help-block with-errors"></div>
							@error('inputemail')
								<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
					</div>

					<div class="column col-md-12">
						<!-- Email input -->
						<div class="form-group">
							<input type="text" class="form-control" id="InputSubject" name="inputsubject" placeholder="Subject" required="required" data-error="Subject is required.">
							<div class="help-block with-errors"></div>
							@error('inputsubject')
								<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
					</div>
			
					<div class="column col-md-12">
						<!-- Message textarea -->
						<div class="form-group">
							<textarea name="inputmessage" id="inputmessage" name="inputmessage" class="form-control" rows="4" placeholder="Your message here..." required="required" data-error="Message is required."></textarea>
							<div class="help-block with-errors"></div>
							@error('inputmessage')
								<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
					</div>
				</div>

				<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit Message</button><!-- Send Button -->

			</form>
			<!-- Contact Form end -->
		</div>
	</section>
@include('frontend.include.instragam_post')
@endsection
@section('footer_script')
@if (session('send'))
<script>
	Swal.fire({
		position: "top-end",
		icon: "success",
		title: "{{ session('send') }}",
		showConfirmButton: false,
		timer: 1500
	});
</script>
@endif
@endsection