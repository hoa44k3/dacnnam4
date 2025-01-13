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
        <p><strong>Mô tả:</strong> {{ $blog->description }}</p>
        <p><strong>Vị trí nội dung:</strong> {{ $blog->position ?? 'Không có' }}</p>
        <p><strong>Video:</strong> 
            @if($blog->video)
                <div>
                    <iframe width="560" height="315" src="{{ $blog->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @else
                <p>Không có video để hiển thị.</p>
            @endif
        </p>
        <p><strong>Danh mục:</strong> {{ $blog->category->name ?? 'Không có' }}</p>
        <p><strong>Trạng thái:</strong> {{ ucfirst($blog->status) }}</p>
        <p><strong>Lượt xem:</strong> {{ $blog->view_count }}</p>
        <p><strong>Ngày tạo:</strong> {{ $blog->created_at->format('d-m-Y H:i:s') }}</p>
        <p><strong>Ngày cập nhật:</strong> {{ $blog->updated_at->format('d-m-Y H:i:s') }}</p>
    </div>
</div>

@endsection
