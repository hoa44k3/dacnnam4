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
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.dish_info {
    padding-left: 30px;
    padding-right: 30px;
}

.dish_info h2 {
    font-size: 32px;
    font-weight: bold;
}

.price h4 {
    font-size: 24px;
}

.dish_description {
    font-size: 16px;
    line-height: 1.6;
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
                    <h2 class="text-primary">{{ $dish->name }}</h2>
                    <div class="price">
                        <h4 class="text-success">Giá: ${{ $dish->price }}</h4>
                        @if($dish->sale_price)
                            <h4 class="text-danger text-decoration-line-through">Giá cũ: ${{ $dish->sale_price }}</h4>
                        @endif
                    </div>
                    <p class="dish_description mt-3">{{ $dish->description }}</p>
                    <p class="category_info">Danh mục: <a href="#" class="text-info">{{ $dish->category->name }}</a></p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-warning btn-lg">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
