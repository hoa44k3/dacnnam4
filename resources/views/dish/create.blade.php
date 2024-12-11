@extends('admin.master')
@section('title', 'Create Dish')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Thêm món ăn</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('dish.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên món ăn</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>
</div>
@endsection
