@extends('site.master')

@section('title','Trang chủ')
@section('body')
<!-- Start banner bottom -->
<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
	<div class="col-lg-8 offset-lg-4">
		<div class="banner_content">
			<div class="row d-flex align-items-center">
				<div class="col-lg-7 col-md-12">
					<h1>Liên hệ </h1>
					<p>Giải đáp mọi yêu cầu hay thắc mắc của khách hàng luôn chính xác và phản hổi nhanh nhất tới mọi khách hàng</p>
				</div>
				<div class="col-lg-5 col-md-12">
					<div class="page-link-wrap">
						<div class="page_link">
							<a href="{{ route('home') }}">Home</a>
							<a href="{{ route('contact') }}">Contact</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End banner bottom -->
		<!--================Contact Area =================-->
		<section class="contact_area section_gap">
			<div class="container">
				<div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
				 data-mlat="40.701083" data-mlon="-74.1522848">
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="contact_info">
							<div class="info_item">
								<i class="lnr lnr-home"></i>
								<h6>California, United States</h6>
								<p>Santa monica bullevard</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-phone-handset"></i>
								<h6><a href="#">00 (440) 9865 562</a></h6>
								<p>Mon to Fri 9am to 6 pm</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-envelope"></i>
								<h6><a href="#">support@colorlib.com</a></h6>
								<p>Send us your query anytime!</p>
							</div>
						</div>
					</div>
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					<div class="col-lg-9">
						<form class="row contact_form" action="{{ url('/contact') }}" method="POST" id="contactForm" novalidate="novalidate">
							@csrf  <!-- Token bảo vệ CSRF -->

							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
									@error('name') <span class="text-danger">{{ $message }}</span> @enderror
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="{{ old('email') }}">
									@error('email') <span class="text-danger">{{ $message }}</span> @enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message">{{ old('message') }}</textarea>
									@error('message') <span class="text-danger">{{ $message }}</span> @enderror
								</div>
							</div>

							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="primary-btn text-uppercase">Send Message</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</section>
		<!--================Contact Area =================-->
        @endsection	
	