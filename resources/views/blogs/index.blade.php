@extends('admin.master')
@section('title', 'Blog Manager')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách blog</h4>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Thêm Blog</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên blog</th>
                       
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->name }}</td>
                           
                            <td>
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" width="50">
                            </td>
                            <td>{{ $blog->description }}</td>
                            <td>{{ ucfirst($blog->status) }}</td>
                            <td>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection