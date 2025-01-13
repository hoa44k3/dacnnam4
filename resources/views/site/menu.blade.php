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

    .dishes-container {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;  /* Khoảng cách giữa các món ăn */
    }

    .dish-item {
        width: calc(50% - 30px);  /* Mỗi món ăn chiếm 50% chiều rộng */
        box-sizing: border-box;   /* Đảm bảo các phần tử không vượt quá chiều rộng của cột */
    }

    @media (max-width: 768px) {
        .dish-item {
            width: 100%;  /* Trên thiết bị di động, mỗi món ăn chiếm toàn bộ chiều rộng */
        }
}

</style>
<!-- Start banner bottom -->
<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
    <div class="col-lg-8 offset-lg-4">
        <div class="banner_content">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1>Danh sách các món ăn</h1>
                    <p>Tổng hợp tất cả các món ăn và đồ uống có trong nhà hàng!</p>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="page-link-wrap">
                        <div class="page_link">
                            
                            <a href="#">Món ăn</a>
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
        <div class="row menu_inner">
            @foreach($categories as $category)
                <div class="col-lg-6 @if($loop->iteration % 2 == 0) offset-lg-0 @endif">
                    <div class="menu_list" style="background-color: #f8f9fa; border-radius: 40px; padding: 30px; width: 100%; box-sizing: border-box; margin-bottom: 20px;">
                        <h1 style="color: #d9534f; font-weight: bold;">{{ $category->name }}</h1>
                        <div class="dishes-container">
                            @foreach($category->dishes as $dish)
                                <div class="dish-item" style="padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; transition: all 0.3s ease;">
                                    <h4 style="color: #007bff; font-weight: bold;">
                                        <a href="#" class="dish-link" data-dish-id="{{ $dish->id }}" style="text-decoration: none;">
                                            {{ $dish->name }}
                                        </a>
                                    </h4>
                                    <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto;">
                                    
                                    <p><strong>Mô tả: </strong>{!! \Illuminate\Support\Str::limit(strip_tags($dish->description), 100) !!}</p>
                                    
                                    <!-- Nút xem chi tiết -->
                                    <a href="{{ route('dish_detail', ['id' => $dish->id]) }}" class="blog_btn" style="text-decoration: none; color: #007bff; font-weight: bold;">Xem thêm</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>
@endsection
