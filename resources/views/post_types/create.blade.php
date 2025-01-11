@extends('admin.master')

@section('body')
<h1>Thêm loại bài viết</h1>
<form action="{{ route('post_types.store') }}" method="POST">
    @csrf
    <label for="name">Tên loại bài viết:</label>
    <input type="text" name="name" id="name" required placeholder="Nhập tên loại bài viết">
    <button type="submit">Thêm</button>
</form>
@endsection
