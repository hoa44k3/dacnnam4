@extends('admin.master')
@section('title', 'Edit Dish')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Sửa món ăn</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('dish.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên món ăn</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $dish->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $dish->price }}" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ $dish->sale_price }}">
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $dish->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($dish->image)
                    <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $dish->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
