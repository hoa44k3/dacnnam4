@extends('admin.master')
@section('title', 'Thêm Blog')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Thêm Blog Mới</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên Blog</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
           
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
@endsection