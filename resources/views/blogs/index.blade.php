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
                        <th>Tiêu đề bài viết</th>
                        <th>Hình ảnh</th>
                        <th>Thẻ</th>
                        <th>Mô tả ngắn</th>
                        <th>Nội dung bài viết</th>     
                        <th>Danh mục</th> 
                        <th>Trạng thái</th>                    
                        <th>Lượt xem</th>
                        <th>Ngày tạo</th>
                        <th>Video</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" width="100px">
                            </td>
                            <td>
                                @foreach ($blog->tags as $tag)
                                    <span class="badge bg-primary">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                           
                            <td>{{ \Illuminate\Support\Str::limit($blog->description, 50) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($blog->position, 50) }}</td> 
                            
                            <td>{{ $blog->category ? $blog->category->name : 'Chưa phân loại' }}</td> 
                            <td>{{ ucfirst($blog->status) }}</td>
                            <td>{{ $blog->view_count }}</td>
                            <td>{{ $blog->created_at->format('d-m-Y') }}</td>
                            <td>
                                @if($blog->video)
                                   
                                    <button class="btn btn-primary btn-sm" onclick="playVideo('{{ $blog->video }}', {{ $blog->id }})">Xem Video</button>
                                    
                                    <div id="video-{{ $blog->id }}" style="display:none;">
                                        <iframe width="500" height="315" id="video-frame-{{ $blog->id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <button class="btn btn-danger btn-sm mt-2" onclick="hideVideo({{ $blog->id }})">Ẩn Video</button>
                                    </div>
                                @else
                                    Không có video
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline delete-form" title="Xóa">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
<script>
    function playVideo(videoUrl, blogId) {
        var iframe = document.getElementById('video-frame-' + blogId);
        document.getElementById('video-' + blogId).style.display = 'block';
        iframe.src = videoUrl;
    }

    function hideVideo(blogId) {
        document.getElementById('video-' + blogId).style.display = 'none';
        var iframe = document.getElementById('video-frame-' + blogId);
        iframe.src = '';
    }

    function playVideo(videoUrl, blogId) {
    var iframe = document.getElementById('video-frame-' + blogId);
    var videoEmbedUrl;

    if (videoUrl.includes('youtube.com/watch') || videoUrl.includes('youtu.be')) {
        videoEmbedUrl = convertYouTubeUrlToEmbed(videoUrl);
    } else {
        videoEmbedUrl = videoUrl; 
    }
    document.getElementById('video-' + blogId).style.display = 'block';
    iframe.src = videoEmbedUrl;
}

function hideVideo(blogId) {
    document.getElementById('video-' + blogId).style.display = 'none';
    var iframe = document.getElementById('video-frame-' + blogId);
    iframe.src = '';
}

function convertYouTubeUrlToEmbed(url) {
    if (url.includes('youtube.com/watch')) {
        return url.replace('watch?v=', 'embed/');
    } else if (url.includes('youtu.be')) {
        return url.replace('youtu.be/', 'youtube.com/embed/');
    }
    return url;
}

</script>


