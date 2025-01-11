@extends('admin.master')
@section('title', 'Chi Tiết Món Ăn')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Chi Tiết Món Ăn: {{ $dish->name }}</h4>
        <a href="{{ route('dish.index') }}" class="btn btn-primary">Quay lại danh sách</a>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Ảnh Món Ăn -->
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid" style="max-height: 400px; object-fit: cover;">
            </div>
            <!-- Thông Tin Chi Tiết -->
            <div class="col-md-6">
                <h3>{{ $dish->name }}</h3>
                <p><strong>VÙng miền:</strong> {{ $dish->region->name ?? 'Không xác định' }}</p>
                <p><strong>Danh Mục:</strong> {{ $dish->category->name ?? 'Không có danh mục' }}</p>
                <p><strong>Mô Tả:</strong></p>
                <p>{{ $dish->description }}</p>
            </div>
        </div>
        <hr>
        <!-- Thông tin thêm -->
        <div>
            <h5>Thông tin thêm:</h5>
            <p><strong>Ngày tạo:</strong> {{ $dish->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $dish->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
