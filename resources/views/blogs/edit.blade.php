@extends('admin.master')
@section('title', 'Sửa Blog')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Sửa Blog</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên Blog</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $blog->name }}" required>
            </div>
          
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" class="form-control" id="image">
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" width="100" class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="description">Mô tả ngắn</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ $blog->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="position">Nôi dung</label>
                <textarea name="position" class="form-control" id="position" rows="4" required>{{ $blog->position }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $blog->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $blog->status === 'approved' ? 'selected' : '' }}>Approved</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="post_type_id">Phân loại bài viết</label>
                <select name="post_type_id" id="post_type_id" class="form-control">
                    <option value="">Chọn loại bài viết</option>
                    @foreach($postTypes as $type)
                        <option value="{{ $type->id }}" {{ old('post_type_id', $blog->post_type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="video">Video</label>
                <!-- Hiển thị video hiện tại (nếu có) -->
                @if($blog->video)
                    <div>
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/' . $blog->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            
                <!-- Cho phép tải lên video mới -->
                <input type="file" name="video" class="form-control" id="video" accept="video/*">
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
