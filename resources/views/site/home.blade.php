

@extends('site.master')

@section('title','Trang chủ')
@section('body')
<div class="breakfast-area section_gap_top">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            @foreach($blogs as $key => $blog)
                <div class="col-lg-6 {{ $key % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}">
                    <div class="right-img">
                       
                        <img class="img1 img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}">
                    </div>
                </div>
                <div class="col-lg-5 {{ $key % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }}">
                    <div class="left-content">
                        <h1>{{ $blog->name }}</h1>
                        <p>{{ $blog->description }}</p>
                        <p><strong>Thuộc:</strong> {{ $blog->category->name ?? 'Không có' }}</p>
                        <p><strong>Lượt xem:</strong> {{ $blog->view_count }}</p>
                        <p><strong>Thành phần:</strong> 
                            @if($blog->tags->isNotEmpty())
                                {{ $blog->tags->pluck('name')->join(', ') }}
                            @else
                                Không có thẻ tag
                            @endif
                        </p>
						<a href="{{ route('blogdetail', ['id' => $blog->id]) }}" class="blog_btn">Chi tiết</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



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