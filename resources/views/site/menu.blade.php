@extends('site.master')

@section('title','Trang chủ')
@section('body')
<!-- Start banner bottom -->
<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
    <div class="col-lg-8 offset-lg-4">
        <div class="banner_content">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1>Danh sách thực đơn</h1>
                    <p>Tổng hợp tất cả các món ăn và đồ uống có trong nhà hàng!</p>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="page-link-wrap">
                        <div class="page_link">
                            <a href="#">Home</a>
                            <a href="#">Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner bottom -->
<!--================ End Home Banner Area =================-->

<!--================ Menu Area =================-->
<section class="menu_area section_gap">
    <div class="container">
        <div class="row menu_inner">
            @foreach($categories as $category)
                <div class="col-lg-5 @if($loop->iteration % 2 == 0) offset-lg-1 @endif">
                    <div class="menu_list">
                        <h1>{{ $category->name }}</h1>
                        <ul class="list">
                            @foreach($category->dishes as $dish)
                                <li>
                                    <h4>
                                        <a href="javascript:void(0)" class="dish-link" data-dish-id="{{ $dish->id }}">{{ $dish->name }}</a>
                                        <span>${{ $dish->price }}</span>
                                    </h4>
                                    <p>{{ $dish->description }}</p>
                                    
                                    <!-- Hidden dish detail -->
                                    <div class="dish-detail" id="dish-detail-{{ $dish->id }}" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <!-- Dish Image -->
                                                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid">
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- Dish Info -->
                                                <h3>{{ $dish->name }}</h3>
                                                <p><strong>Giá:</strong> ${{ $dish->price }}</p>
                                                @if($dish->sale_price)
                                                    <p><strong>Giá khuyến mãi:</strong> ${{ $dish->sale_price }}</p>
                                                @endif
                                                <p><strong>Mô tả:</strong> {{ $dish->description }}</p>
                                                <p><strong>Danh mục:</strong> <a href="#">{{ $dish->category->name }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================End Menu Area =================-->

<!-- Add JavaScript to toggle details -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dishLinks = document.querySelectorAll('.dish-link');
        
        dishLinks.forEach(link => {
            link.addEventListener('click', function () {
                const dishId = this.getAttribute('data-dish-id');
                const dishDetail = document.getElementById('dish-detail-' + dishId);
                
                // Toggle display of the dish details
                if (dishDetail.style.display === 'none' || dishDetail.style.display === '') {
                    dishDetail.style.display = 'block';
                } else {
                    dishDetail.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
