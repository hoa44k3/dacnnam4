@extends('site.master')

@section('title','Trang chủ')
@section('body')
		<!--================ Start Breakfast Area =================-->
		<div class="breakfast-area section_gap_top">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-5">
						<div class="left-content">
							<h1>Daily Food Courses with Drinks </h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
							<a href="#" class="primary-btn">See Full Menu</a>
						</div>
					</div>
					<div class="col-lg-6 offset-lg-1">
						<div class="right-img">
							<img class="img1 img-fluid" src="img/food/food1.jpg" alt="">
							<img class="img2 img-fluid" src="img/food/food2.png" alt="">
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
					<div class="col-lg-6 ">
						<div class="right-img">
							<img class="img1 img-fluid" src="img/food/food3.jpg" alt="">
							<img class="img2 img-fluid" src="img/food/food4.png" alt="">
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="left-content">
							<h1>Daily Food Courses with Drinks </h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
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
