@extends('site.master')

@section('title', 'Giới thiệu')

@section('body')
<style>
	.about-us-section {
    display: flex; /* Đặt Flexbox cho các phần tử con */
    justify-content: space-between; /* Cân chỉnh nội dung và ảnh sang hai bên */
    align-items: center; /* Căn chỉnh dọc giữa các phần tử */
    margin-bottom: 30px; /* Khoảng cách dưới mỗi phần giới thiệu */
}

.left-content {
    max-width: 100%; /* Giới hạn chiều rộng của phần nội dung */
    padding-right: 30px; /* Khoảng cách giữa nội dung và ảnh */
}

.right-img img.about-img {
    width: 100%; /* Giữ chiều rộng ảnh bằng 100% */
    height: auto; /* Giữ tỷ lệ khung hình cho ảnh */
    object-fit: cover; /* Cắt ảnh nếu cần để tránh bị méo */
    border-radius: 10px; /* Góc bo tròn cho ảnh */
}

/* Đảm bảo responsive cho ảnh và nội dung khi thu nhỏ màn hình */
@media (max-width: 992px) {
    .about-us-section {
        flex-direction: column; /* Sắp xếp theo chiều dọc trên màn hình nhỏ */
        text-align: center; /* Căn chỉnh nội dung vào giữa */
    }

    .right-img img.about-img {
        width: 80%; /* Giảm kích thước ảnh trên màn hình nhỏ */
        margin: 0 auto; /* Căn giữa ảnh */
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
					<!-- Left content -->
					<div class="col-lg-6">
						<div class="left-content">
							<h1>{{ $about->title }}</h1>
							<p>{{ $about->content }}</p>
							<p><strong>Sứ mệnh:</strong> {{ $about->mission }}</p>
							<p><strong>Tầm nhìn:</strong> {{ $about->vision }}</p>
						</div>
					</div>
					
					<!-- Right image -->
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
