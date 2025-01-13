@extends('site.master')

@section('title', 'Giới thiệu')

@section('body')
<style>
	.about-us-section {
    display: flex; 
    justify-content: space-between; 
    align-items: center;
    margin-bottom: 30px; 
}

.left-content {
    max-width: 100%; 
    padding-right: 30px; 
}

.right-img img.about-img {
    width: 100%; 
    height: auto; 
    object-fit: cover; 
    border-radius: 10px; 
}

@media (max-width: 992px) {
    .about-us-section {
        flex-direction: column; 
        text-align: center; 
    }

    .right-img img.about-img {
        width: 80%; 
        margin: 0 auto;
    }
}

</style>
	<!-- Start Banner -->
	<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
		<div class="col-lg-8 offset-lg-4">
			<div class="banner_content">
				<div class="row d-flex align-items-center">
					<div class="col-lg-7 col-md-12">
						<h1>Giới thiệu về chúng tôi</h1>
						<p>Cửa hàng chúng tôi luôn cung cấp các mặt hàng món ăn chất lượng, đảm bảo sức khỏe của khách hàng luôn đặt lên hàng đầu</p>
					</div>
					<div class="col-lg-5 col-md-12">
						<div class="page-link-wrap">
							<div class="page_link">
								<a href="{{ route('home') }}">Home</a>
								<a href="{{ route('about') }}">About Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Banner -->

	<!-- Start About Section -->
	<div class="breakfast-area section_gap_top">
		<div class="container">
			@foreach ($aboutUs as $about)
				<div class="row align-items-center justify-content-center about-us-section">
					
					<div class="col-lg-6">
						<div class="left-content">
							<h1>{{ $about->title }}</h1>
							<p>{{ $about->content }}</p>
							<p><strong>Sứ mệnh:</strong> {{ $about->mission }}</p>
							<p><strong>Tầm nhìn:</strong> {{ $about->vision }}</p>
						</div>
					</div>
	
					<div class="col-lg-6">
						<div class="right-img">
							@if($about->image_path)
								<img class="img-fluid about-img" src="{{ asset('storage/' . $about->image_path) }}" alt="About Us Image">
							@else
								<p>No image available</p>
							@endif
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<!-- End About Section -->

@endsection
