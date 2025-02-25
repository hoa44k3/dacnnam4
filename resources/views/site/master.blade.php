<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <title>SteakShop Restaurant</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>

	<!--================ Start Header Menu Area =================-->
	<div class="menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<header class="fixed-menu">
		<span class="menu-close"><i class="fa fa-times"></i></span>
		<div class="menu-header">
			<div class="logo d-flex justify-content-center">
				<img src="img/logo.png" alt="">
			</div>
		</div>
		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
							<img src="img/header/nav-icon1.png" alt=""> Trang chủ
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
							<img src="img/header/nav-icon2.png" alt="">Giới thiệu
						</a>
					</li>
					<li class="nav-item submenu dropdown">
						<a href="#" class="nav-link dropdown-toggle {{ Request::routeIs('menu', 'dish_detail') ? 'active' : '' }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<img src="img/header/nav-icon7.png" alt="">Món ăn
						</a>
						<ul class="dropdown-menu">
							<li class="nav-item">
								<a class="nav-link {{ Request::routeIs('menu') ? 'active' : '' }}" href="{{ route('menu') }}">Món ăn</a>
							</li>
							<li class="nav-item">
								
								<a class="nav-link {{ Request::routeIs('dish_detail') ? 'active' : '' }}" href="{{ route('dish_detail', ['id' => isset($dish) ? $dish->id : 1]) }}">Chi tiết món ăn</a>
							</li>
						</ul>
					</li>
					
					<li class="nav-item submenu dropdown">
						<a href="#" class="nav-link dropdown-toggle {{ Request::routeIs('blog', 'blogdetail') ? 'active' : '' }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<img src="img/header/nav-icon7.png" alt="">Bài viết
						</a>
						<ul class="dropdown-menu">
							<li class="nav-item">
								<a class="nav-link {{ Request::routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Bài viết</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ Request::routeIs('blogdetail') ? 'active' : '' }}" href="{{ route('blogdetail', ['id' => optional($blog)->id]) }}">Chi tiết bài viết</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
							<img src="img/header/nav-icon8.png" alt="">Liên hệ
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::routeIs('auth.login') ? 'active' : '' }}" href="{{ route('auth.login') }}">
							<img src="img/header/nav-icon8.png" alt="">Đăng nhập
						</a>
					</li>
				</ul>
				
			</div>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->

	<div class="site-main">
		<!--================ Start Home Banner Area =================-->
		<section class="home_banner_area">
			<div class="banner_inner">
				<div class="container-fluid no-padding">
					<div class="row fullscreen">

					</div>
				</div>
			</div>
		</section>
		<!-- Start banner bottom -->
		<div class="row banner-bottom align-items-center justify-content-center">
			<div class="col-lg-4">
				<div class="video-popup d-flex align-items-center">
					<a class="play-video video-play-button animate" href="https://www.youtube.com/watch?v=KUln2DXU5VE" data-animate="zoomIn"
					 data-duration="1.5s" data-delay="0.1s">
						<span><img src="img/banner/play-icon.png" alt=""></span>
					</a>
					<div class="watch">
						<h6>Watch video</h6>
						<p>You will love our execution</p>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="banner_content">
					<div class="row d-flex align-items-center">
						<div class="col-lg-8 col-md-12">
							<p class="top-text"> Đảm bảo mọi nội dung luôn đúng sự thật với thực tế!</p>
							<h1>Giới thiệu các món ăn ngon ở mọi nơi</h1>
							{{-- <p>Khẩu vị của khách hàng luôn là tiêu chí hàng đầu trong nhà hàng của chúng tôi! Mong mọi quý khách sẽ có một bữa ăn ngon nhất.</p> --}}
						</div>
						<div class="col-lg-4 col-md-12">
							<div class="banner-btn">
								<a class="primary-btn text-uppercase" href="#">Explore Menu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End banner bottom -->
		<!--================ End Home Banner Area =================-->

		@yield('body')

		<!--================ Start Footer Area =================-->
		<footer class="footer-area overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Top Products</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Managed Website</a></li>
										<li><a href="#">Manage Reputation</a></li>
										<li><a href="#">Power Tools</a></li>
										<li><a href="#">Marketing Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Quick Links</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Jobs</a></li>
										<li><a href="#">Brand Assets</a></li>
										<li><a href="#">Investor Relations</a></li>
										<li><a href="#">Terms of Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Features</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Jobs</a></li>
										<li><a href="#">Brand Assets</a></li>
										<li><a href="#">Investor Relations</a></li>
										<li><a href="#">Terms of Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Resources</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Guides</a></li>
										<li><a href="#">Research</a></li>
										<li><a href="#">Experts</a></li>
										<li><a href="#">Agencies</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-8">
						<div class="single-footer-widget">
							<h6>Newsletter</h6>
							<p>Stay update with our latest</p>
							<div class="" id="mc_embed_signup">
								<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								 method="get" class="form-inline">
									<div class="d-flex flex-row">
										<input class="form-control" name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = 'Your email address'" onblur="this.placeholder = 'Your email address'"
										 required="" type="email">
										<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
										<div style="position: absolute; left: -5000px;">
											<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
										</div>
									</div>
									<div class="info"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row footer-bottom justify-content-between">
					<div class="col-lg-6">
						<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
					<div class="col-lg-2">
						<div class="social-icons">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>

			</div>
		</footer>
		<!--================ Start Footer Area =================-->
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/stellar.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<!-- gmaps Js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('js/gmaps.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.querySelector('.form-control');
        const searchResults = document.createElement('div');
        searchResults.className = 'search-results';
        document.body.appendChild(searchResults);

        searchInput.addEventListener('input', function () {
            const query = this.value;
            if (query.length > 1) {
                fetch(`/admin/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        searchResults.innerHTML = '';
                        if (data.blogs.length || data.dishes.length) {
                            data.blogs.forEach(blog => {
                                const item = document.createElement('div');
                                item.textContent = `Bài viết: ${blog.title}`;
                                searchResults.appendChild(item);
                            });
                            data.dishes.forEach(dish => {
                                const item = document.createElement('div');
                                item.textContent = `Món ăn: ${dish.name}`;
                                searchResults.appendChild(item);
                            });
                        } else {
                            searchResults.innerHTML = '<p>Không tìm thấy kết quả</p>';
                        }
                    });
            } else {
                searchResults.innerHTML = '';
            }
        });
    });
</script>

</body>

</html>