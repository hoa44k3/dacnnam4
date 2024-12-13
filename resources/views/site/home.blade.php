

@extends('site.master')

@section('title','Trang chủ')
@section('body')
		<div class="breakfast-area section_gap_top">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					@foreach($blogs as $key => $blog)
						<div class="col-lg-6 {{ $key % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}">
							<div class="right-img">
								<!-- Hiển thị ảnh 1 -->
								<img class="img1 img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}">
								
								<!-- Hiển thị ảnh 2 nếu có -->
								{{-- @if(isset($blogs[$key + 1]))
									<img class="img2 img-fluid" src="{{ asset('storage/' . $blogs[$key + 1]->image) }}" alt="{{ $blogs[$key + 1]->name }}">
								@endif --}}
							</div>
						</div>
						<div class="col-lg-5 {{ $key % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }}">
							<div class="left-content">
								<h1>{{ $blog->name }}</h1>
								<p>{{ $blog->description }}</p>
								<a href="#" class="primary-btn">Read More</a>
							</div>
						</div>
						@break($key == 1) <!-- Dừng vòng lặp sau khi hiển thị 2 bài -->
					@endforeach
				</div>
			</div>
		</div>
		
		
		
		<!--================ Start Reservstion Area =================-->
		<section class="reservation-area section_gap_top">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-6 offset-lg-6">
						<div class="contact-form-section">
							<h1>Đặt bàn</h1>
							<form class="contact-form-area contact-page-form contact-form text-right" id="myForm" action="mail.html" method="post">
								<div class="form-group col-md-12">
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Name'">
								</div>
								<div class="form-group col-md-12">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Email Address'">
								</div>
								<div class="form-group col-md-12">
									<input type="text" class="form-control" id="subject" name="subject" placeholder="Phone Number" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Phone Number'">
								</div>
								<div class="form-group col-md-12">
									<div class="form-select">
										<select>
											<option value="1">Number of people</option>
											<option value="1">Number of people</option>
											<option value="1">Number of people</option>
											<option value="1">Number of people</option>
											<option value="1">Number of people</option>
										</select>
									</div>
								</div>
								<div class="form-group col-md-12">
									<input type="text" class="form-control" id="datepicker" name="text" placeholder="Select Date & Time" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Select Date & Time'">
								</div>
								<div class="form-group col-md-12">
									<div class="form-select">
										<select>
											<option value="1">Select event</option>
											<option value="1">Select event Dhaka</option>
											<option value="1">Select event Dilli</option>
											<option value="1">Select event Newyork</option>
											<option value="1">Select event Islamabad</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<button class="primary-btn text-uppercase">Make Reservation</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--================ End Reservstion Area =================-->

		<!--================ Start Chef Area =================-->
		<div class="chef-area section_gap_top">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="left-chef">
							<img class="img-fluid" src="img/chef/chef1.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="left-content">
							<h1>Các món ăn hàng ngày có đồ uống </h1>
							<p>Luôn luôn tận tâm, tận tình, chu đáo phục vụ khách hàng 24/24h!.</p>
							<p>Tạo một không gian ăn uống thoải mái và lành mạnh, đảm bảo chất lượng đồ ăn 100% là đồ tươi ngon nhập khẩu từ Mỹ</p>
							<img src="img/chef/signature.png" alt="">
						</div>
					</div>
				</div>
				<div class="row chef-items">
					<div class="col-lg-12 offset-lg-1">
						<div class="row">
							<!-- single chef item -->
							<div class="col-lg-2 col-md-5">
								<div class="single-chef-item">
									<a href="img/food/food5.jpg" class="img-popup"><img src="img/chef/item1.png" alt=""></a>
								</div>
							</div>
							<!-- single chef item -->
							<div class="col-lg-2 col-md-5">
								<div class="single-chef-item">
									<a href="img/food/food6.jpg" class="img-popup"><img src="img/chef/item2.png" alt=""></a>
								</div>
							</div>
							<!-- single chef item -->
							<div class="col-lg-2 col-md-5">
								<div class="single-chef-item">
									<a href="img/food/food7.jpg" class="img-popup"><img src="img/chef/item3.png" alt=""></a>
								</div>
							</div>
							<!-- single chef item -->
							<div class="col-lg-2 col-md-5">
								<div class="single-chef-item">
									<a href="img/food/food8.jpg" class="img-popup"><img src="img/chef/item4.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--================ End Chef Area =================-->

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

		<!--================ Start Brands Area =================-->
		<section class="brands-area section_gap">
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