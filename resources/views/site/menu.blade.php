@extends('site.master')

@section('title', 'Trang chủ')
@section('body')
<style>
    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        background-color: #fff;
        transition: border-color 0.3s ease;
    }

    select:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
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

<section class="menu_area section_gap">
    <div class="container">
        <form action="{{ route('menu') }}" method="GET">
            <label for="region">Chọn vùng miền:</label>
            <select name="region" id="region">
                <option value="">All</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ request('region') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
            <button type="submit">Lọc</button>
        </form>
        <div class="row menu_inner mt-4">
            @foreach($categories as $category)
                <div class="col-lg-5 @if($loop->iteration % 2 == 0) offset-lg-1 @endif">
                    <div class="menu_list" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px;">
                        <h1 style="color: #d9534f; font-weight: bold;">{{ $category->name }}</h1>
                        <ul class="list">
                            @foreach($category->dishes as $dish)
                                <li style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; transition: all 0.3s ease;">
                                    <h4 style="color: #007bff; font-weight: bold;">
                                        <a href="javascript:void(0)" class="dish-link" data-dish-id="{{ $dish->id }}" style="text-decoration: none;">
                                            {{ $dish->name }}
                                        </a>
                                    </h4>
                                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($dish->description), 100) !!}</p>
        
                                    <!-- Chi tiết món ăn, ban đầu ẩn -->
                                    <div class="dish-detail" id="dish-detail-{{ $dish->id }}" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid" style="border-radius: 10px;">
                                            </div>
                                            <div class="col-lg-6">
                                                <h3>{{ $dish->name }}</h3>
                                                <p><strong>Mô tả:</strong> {{ $dish->description }}</p>
                                                <p><strong>Thuộc:</strong> <a href="#">{{ $dish->category->name }}</a></p>
                                                <p><strong>Nguyên liệu:</strong> {{ $dish->ingredients }}</p>
                                                <p><strong>Cách làm:</strong> {{ $dish->preparation }}</p>
                                                <p><strong>Giá trị văn hóa:</strong> {{ $dish->cultural_value }}</p>
                                                <p><strong>Nguồn gốc:</strong> {{ $dish->origin }}</p>
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
