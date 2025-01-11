@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Về chúng tôi</h4>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung bài viết</th>
                        <th>Sứ mệnh</th>
                        <th>Tầm nhìn</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aboutUs as $about)
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->content }}</td>
                            <td>{{ $about->mission }}</td>
                            <td> {{ $about->vision }}</td>
                            <td><img src="{{ asset('storage/' . $about->image_path) }}" alt="About Us Image" width="200"></td>
                            <td><a href="{{ route('about_us.edit', $about->id) }}" class="btn btn-warning btn-sm" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>               
@endsection
