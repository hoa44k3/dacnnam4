@extends('admin.master')

@section('body')
    <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>
    @if($blogs->isEmpty() && $dishes->isEmpty())
        <p>Không tìm thấy kết quả nào.</p>
    @else
        <h2>Bài viết</h2>
        <ul>
            @foreach($blogs as $blog)
                <li>{{ $blog->title }}</li>
            @endforeach
        </ul>
        
        <h2>Món ăn</h2>
        <ul>
            @foreach($dishes as $dish)
                <li>{{ $dish->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
