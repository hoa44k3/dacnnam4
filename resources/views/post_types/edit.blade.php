@extends('admin.master')

@section('body')
<h1>Sửa loại bài viết</h1>
<form action="{{ route('post_types.update', $postType->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Tên loại bài viết:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $postType->name) }}" required>
    <button type="submit">Cập nhật</button>
</form>
@endsection
