@extends('site.master')

@section('title','Trang chủ')
@section('body')
<style>
    /* Bố cục Blog */
.blog_area {
    background-color: #f8f9fa;
    padding: 40px 0;
}

.single-post {
    margin-bottom: 40px;
}

.feature-img img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.blog_info {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.blog_info .post_tag a {
    display: inline-block;
    margin: 5px;
    padding: 5px 10px;
    background-color: #e1e1e1;
    border-radius: 20px;
    font-size: 14px;
    color: #333;
    text-decoration: none;
}

.blog_info .blog_meta {
    list-style: none;
    padding-left: 0;
}

.blog_info .blog_meta li {
    margin-bottom: 8px;
    font-size: 14px;
}

.video-container {
    margin-top: 20px;
    margin-bottom: 40px;
}

.related-posts h4 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.single-related-post {
    margin-bottom: 20px;
}

.single-related-post img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

.single-related-post h5 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.single-related-post p {
    font-size: 14px;
    color: #555;
}

@media (max-width: 991px) {
    .single-post .col-lg-8, .single-post .col-lg-4 {
        margin-bottom: 30px;
    }

    .related-posts {
        margin-top: 30px;
    }
}

@media (max-width: 768px) {
    .single-post .col-lg-12 {
        margin-bottom: 20px;
    }

    .related-posts {
        margin-top: 20px;
    }
}

</style>
<!-- Start banner bottom -->
<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
    <div class="col-lg-8 offset-lg-4">
        <div class="banner_content">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1>Chi tiết bài viết</h1>
                    <p>Mọi phản hồi của tất cả quý khách sẽ luôn đem lại những giá trị lớn cho cửa hàng chúng tôi.</p>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="page-link-wrap">
                        <div class="page_link">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('blog') }}">Blog</a>
                            <a href="#">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner bottom -->
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area section_gap">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <!-- Image -->
                            <div class="col-lg-8">
                                <div class="feature-img">
                                    <img class="img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}">
                                </div>
                            </div>
                            
                            <!-- Blog Info -->
                            <div class="col-lg-4">
                                <div class="blog_info text-left">
                                    <div class="post_tag">
                                        @foreach ($blog->tags as $tag)
                                            <a href="#">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                    <ul class="blog_meta list">
                                       
                                        <li><a href="#">Danh mục: {{ $blog->category ? $blog->category->name : 'Uncategorized' }}<i class="lnr lnr-list"></i></a></li>
                                        <li><a href="#">Lượt xem: {{ $blog->view_count }}<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">Ngày tạo: {{ $blog->created_at ? $blog->created_at->format('d M, Y') : 'Unknown Date' }}<i class="lnr lnr-calendar-full"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
        
                        <!-- Blog Content -->
                        <div class="col-lg-12 blog_details">
                            <h2>{{ $blog->name }}</h2>
                            <p class="excert">{{ $blog->description }}</p>
                            <p>{{ $blog->position ?? 'Không có nội dung' }}</p>
                            
                            @if($blog->video)
                                <div class="video-container">
                                    @if(str_contains($blog->video, 'youtube.com') || str_contains($blog->video, 'youtu.be'))
                                        <iframe width="100%" height="315" src="{{ $blog->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @else
                                        <video controls width="100%">
                                            <source src="{{ asset('storage/videos/' . $blog->video) }}" type="video/mp4">
                                            Trình duyệt của bạn không hỗ trợ video.
                                        </video>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
        
                    <!-- Related Posts -->
                    <div class="col-lg-4 related-posts mt-5">
                        <h4>Bài viết liên quan</h4>
                        <div class="row">
                            @foreach ($relatedBlogs as $related)
                                <div class="col-lg-12">
                                    <div class="single-related-post">
                                        <img class="img-fluid" src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}">
                                        <h5><a href="{{ route('blogdetail', ['id' => $related->id]) }}">{{ $related->name }}</a></h5>
                                        <p>{{ \Illuminate\Support\Str::limit($related->description, 100) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
    
                        
                         <!-- Form bình luận -->
                        <form id="commentForm" action="{{ route('blogcomment', $blog->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="content">Bình luận</label>
                                <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                        </form>

                        <!-- Hiển thị các bình luận -->
                        <div id="comments-section">
                            @foreach ($blog->comments as $comment)
                                <div class="comment">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <p>{{ $comment->content }}</p>
                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@endsection
<script>
   
    document.getElementById('commentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const content = document.getElementById('content').value;
        const blogId = {{ $blog->id }};
        const token = document.querySelector('input[name="_token"]').value;

        fetch(`/comment/${blogId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                content: content
            })
        })
        .then(response => response.json())
        .then(data => {
            const commentSection = document.getElementById('comments-section');
            const newComment = `
                <div class="comment">
                    <strong>${data.user}</strong>
                    <p>${data.content}</p>
                    <span>${data.created_at}</span>
                </div>
            `;
            commentSection.innerHTML += newComment; 
            document.getElementById('content').value = ''; 
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

   