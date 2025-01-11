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
                <label for="region_id">Vùng miền</label>
                <select name="region_id" id="region_id" class="form-control">
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
          
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="origin">Nguồn gốc</label>
                <textarea name="origin" id="origin" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="ingredients">Nguyên liệu</label>
                <textarea name="ingredients" id="ingredients" class="form-control" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="preparation">Cách làm</label>
                <textarea name="preparation" id="preparation" class="form-control" rows="7" required></textarea>
            </div>
            <div class="form-group">
                <label for="cultural_value">Giá trị văn hóa</label>
                <textarea name="cultural_value" id="cultural_value" class="form-control" rows="8" required></textarea>
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
