@extends('site.master') 
@section('title', $dish->name)

@section('body')
<style>
    .dish_detail_area {
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .dish_image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dish_info {
        padding-left: 30px;
        padding-right: 30px;
    }

    .dish_info h2 {
        font-size: 32px;
        font-weight: bold;
        color: #1d4ed8;
    }

    .price h4 {
        font-size: 24px;
    }

    .dish_description {
        font-size: 16px;
        line-height: 1.6;
        margin-top: 20px;
    }

    .category_info {
        font-size: 14px;
        margin-top: 10px;
    }

    .btn-lg {
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 50px;
    }

    .dish_details_section {
        margin-top: 40px;
    }

    .dish_details_section h3 {
        font-size: 28px;
        color: #1d4ed8;
        margin-bottom: 20px;
    }

    .dish_details_section p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .category_info a {
        color: #0d6efd;
        text-decoration: none;
    }

    .category_info a:hover {
        text-decoration: underline;
    }
</style>

<section class="dish_detail_area section_gap">
    <div class="container">
        <div class="row">
            <!-- Hình ảnh món ăn -->
            <div class="col-lg-6">
                <div class="dish_image">
                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid rounded shadow-lg">
                    @else
                        <img src="{{ asset('assets/img/default-dish.jpg') }}" alt="No image available" class="img-fluid rounded shadow-lg">
                    @endif
                </div>
            </div>
            
            <!-- Thông tin món ăn -->
            <div class="col-lg-6">
                <div class="dish_info">
                    <h2>{{ $dish->name }}</h2>
                    <p class="dish_description">{{ $dish->description }}</p>
                    <p class="category_info">Danh mục: <a href="#">{{ $dish->category->name }}</a></p>
                    
                    <!-- Giá trị văn hóa, nguyên liệu, cách làm -->
                    <div class="dish_details_section">
                        <h3>Thông tin chi tiết</h3>

                        @if($dish->origin)
                            <p><strong>Nguồn gốc:</strong> {{ $dish->origin }}</p>
                        @endif

                        @if($dish->ingredients)
                            <p><strong>Nguyên liệu:</strong> {{ $dish->ingredients }}</p>
                        @endif

                        @if($dish->preparation)
                            <p><strong>Cách làm:</strong> {{ $dish->preparation }}</p>
                        @endif

                        @if($dish->cultural_value)
                            <p><strong>Giá trị văn hóa:</strong> {{ $dish->cultural_value }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
