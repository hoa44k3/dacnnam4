@extends('admin.master')
@section('title', 'Chi tiết Blog')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Chi tiết Blog</h4>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Quay lại</a>

    </div>
    <div class="card-body">
        <h5>{{ $blog->name }}</h5>
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" width="300px">
        <p>{{ $blog->description }}</p>
        <p><strong>Vị trí:</strong> {{ $blog->position ?? 'Không có' }}</p>
        <p><strong>Trạng thái:</strong> {{ ucfirst($blog->status) }}</p>
        <p><strong>Lượt xem:</strong> {{ $blog->view_count }}</p>
        <p><strong>Ngày tạo:</strong> {{ $blog->created_at->format('d-m-Y H:i:s') }}</p>
    </div>
</div>

@endsection
