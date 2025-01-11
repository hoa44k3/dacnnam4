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
                <label for="position">Nôi dung</label>
                <textarea name="position" class="form-control" id="position" rows="4" required>{{ old('position') }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="post_type_id">Phân loại bài viết</label>
                <select name="post_type_id" id="post_type_id" class="form-control">
                    <option value="">Chọn loại bài viết</option>
                    @foreach($postTypes as $type)
                        <option value="{{ $type->id }}" {{ old('post_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Video -->
            {{-- <div class="form-group">
                <label for="video">Video</label>
                <input type="text" name="video" class="form-control" id="video" value="{{ old('video') }}">
            </div> --}}
            <div class="form-group">
                <label for="video">Video (YouTube)</label>
                <input type="text" name="video" class="form-control" id="video" value="{{ old('video') }}" placeholder="Nhập link video YouTube">
            </div>
            
            
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
@endsection
