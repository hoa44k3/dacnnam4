@extends('site.master')

@section('title','Trang chủ')
@section('body')
<style>
	.right-img {
    position: relative;
}

.right-img .img1 {
    position: relative;
    z-index: 1;
}

.right-img .img2 {
    position: absolute;
    top: 30px; /* Điều chỉnh khoảng cách giữa 2 ảnh */
    left: 30px; /* Điều chỉnh vị trí ảnh nhỏ */
    z-index: 0;
    opacity: 0.9; /* Tùy chỉnh độ mờ */
}

</style>
	<!-- Start banner bottom -->
	<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
		<div class="col-lg-8 offset-lg-4">
			<div class="banner_content">
				<div class="row d-flex align-items-center">
					<div class="col-lg-7 col-md-12">
						<h1>Giới thiệu</h1>
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
	<!-- End banner bottom -->
		<!--================ Start Breakfast Area =================-->
		<div class="breakfast-area section_gap_top">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-6">
						<div class="right-img">
							<img class="img1 img-fluid" src="{{ asset('storage/' . $blogTop->image) }}" alt="{{ $blogTop->name }}">
							<img class="img2 img-fluid" src="{{ asset('storage/' . $blogTop->image) }}" alt="{{ $blogTop->name }}">
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="left-content">
							<h1>{{ $blogTop->name }}</h1>
							<p>{{ $blogTop->description }}</p>
							<a href="#" class="primary-btn">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!--================ End Breakfast Area =================-->

		<!--================ Start Food Gallery Area =================-->
		<section class="section_gap_top food-gallery-area">
			<div class="container-fluid no-padding">
				<div class="row owl-carousel active-food-gallery">
					<!-- single gallery item -->
					<div class="single-gallery-item">
						<img class="img-fluid" src="img/food/food5.jpg" alt="">
					</div>
					<!-- single gallery item -->
					<div class="single-gallery-item">
						<img class="img-fluid" src="img/food/food6.jpg" alt="">
					</div>
					<!-- single gallery item -->
					<div class="single-gallery-item">
						<img class="img-fluid" src="img/food/food7.jpg" alt="">
					</div>
					<!-- single gallery item -->
					<div class="single-gallery-item">
						<img class="img-fluid" src="img/food/food8.jpg" alt="">
					</div>
					<!-- single gallery item -->
					<div class="single-gallery-item">
						<img class="img-fluid" src="img/food/food6.jpg" alt="">
					</div>
					<!-- single gallery item -->
					<div class="single-gallery-item">
						<img class="img-fluid" src="img/food/food8.jpg" alt="">
					</div>
				</div>
			</div>
		</section>
		<!--================ End Food Gallery Area =================-->

		<!--================ Start Lunch Area =================-->
		<div class="breakfast-area lunch-area section_gap">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-6">
						<div class="right-img">
							<img class="img1 img-fluid" src="{{ asset('storage/' . $blogBottom->image) }}" alt="{{ $blogBottom->name }}">
							<img class="img2 img-fluid" src="{{ asset('storage/' . $blogBottom->image) }}" alt="{{ $blogBottom->name }}">
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="left-content">
							<h1>{{ $blogBottom->name }}</h1>
							<p>{{ $blogBottom->description }}</p>
							<div class="chef-title">
								<div class="thumb"><img src="img/about-author.png" alt=""></div>
								<div class="c-desc">
									<h6>Marvel Maison</h6>
									<p>Chief Executive, Amazon</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--================ End Lunch Area =================-->

		<!--================ Start Brands Area =================-->
		<section class="brands-area section_gap_bottom">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="main_title">
							<h1>In associasion with</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="owl-carousel brand-carousel">
							<!-- single-brand -->
							<div class="single-brand-item d-table">
								<div class="d-table-cell">
									<img src="img/brands/logo1.png" alt="">
								</div>
							</div>
							<!-- single-brand -->
							<div class="single-brand-item d-table">
								<div class="d-table-cell">
									<img src="img/brands/logo2.png" alt="">
								</div>
							</div>
							<!-- single-brand -->
							<div class="single-brand-item d-table">
								<div class="d-table-cell">
									<img src="img/brands/logo3.png" alt="">
								</div>
							</div>
							<!-- single-brand -->
							<div class="single-brand-item d-table">
								<div class="d-table-cell">
									<img src="img/brands/logo4.png" alt="">
								</div>
							</div>
							<!-- single-brand -->
							<div class="single-brand-item d-table">
								<div class="d-table-cell">
									<img src="img/brands/logo5.png" alt="">
								</div>
							</div>
							<!-- single-brand -->
							<div class="single-brand-item d-table">
								<div class="d-table-cell">
									<img src="img/brands/logo3.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--================ End Brands Area =================-->
@endsection
