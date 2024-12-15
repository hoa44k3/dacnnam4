@extends('admin.master')
@section('title', 'Edit Tag')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Sửa Thẻ Tag</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên Thẻ Tag:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}" required>
            </div>
            <div class="form-group">
                <label for="blog_id">Chọn Blog:</label>
                <select name="blog_id" id="blog_id" class="form-control" required>
                    <option value="" disabled>-- Chọn Blog --</option>
                    @foreach ($blogs as $blog)
                        <option value="{{ $blog->id }}" {{ $blog->id == $tag->blog_id ? 'selected' : '' }}>
                            {{ $blog->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('tags.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>       
</div>
@endsection
