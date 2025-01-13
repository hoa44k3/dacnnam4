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

		<section class="contact_area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="contact_info">
							<div class="info_item">
								<i class="lnr lnr-home"></i>
								<h6>Thành phố Vinh, Nghệ An</h6>
								<p>Santa monica bullevard</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-phone-handset"></i>
								<h6><a href="#">0356694603</a></h6>
								<p>Liên hệ cho số điện thoại</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-envelope"></i>
								<h6><a href="#">pxinh3771@gmail.com</a></h6>
								<p>Gửi liên hệ qua mail!</p>
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
							@csrf  

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
	