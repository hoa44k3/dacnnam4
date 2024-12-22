@extends('site.master')

@section('title','Trang chủ')
@section('body')
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
                <section class="blog_area single-post-area section_gap">
                    <div class="container">
                        <div class="row">
                            <!-- Main Content -->
                            <div class="col-lg-8 posts-list">
                                <div class="single-post row">
                                    <!-- Image -->
                                    <div class="col-lg-12">
                                        <div class="feature-img">
                                            <img class="img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}">
                                        </div>
                                    </div>
                
                                    <!-- Blog Info -->
                                    <div class="col-lg-3 col-md-3">
                                        <div class="blog_info text-right">
                                            <div class="post_tag">
                                                @foreach ($blog->tags as $tag)
                                                    <a href="#">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                            <ul class="blog_meta list">
                                                <li><a href="#">Lượt xem: {{ $blog->view_count }}<i class="lnr lnr-eye"></i></a></li>
                                                <li><a href="#">Ngày tạo: {{ $blog->created_at->format('d M, Y') }}<i class="lnr lnr-calendar-full"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                
                                    <!-- Blog Content -->
                                    <div class="col-lg-9 col-md-9 blog_details">
                                        <h2>{{ $blog->name }}</h2>
                                        <p class="excert">
                                            {{ $blog->description }}
                                        </p>
                                    </div>
                                </div>
                
                                <!-- Related Posts -->
                                <div class="related-posts mt-5">
                                    <h4>Bài viết liên quan</h4>
                                    <div class="row">
                                        @foreach ($relatedBlogs as $related)
                                            <div class="col-lg-6">
                                                <div class="single-related-post">
                                                    <img class="img-fluid" src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}">
                                                    <h5><a href="{{ route('blogdetail', ['id' => $related->id]) }}">{{ $related->name }}</a></h5>
                                                    <p>{{ \Illuminate\Support\Str::limit($related->description, 100) }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                
                            <!-- Sidebar -->
                            <div class="col-lg-4">
                                <div class="blog_right_sidebar">
                                    <!-- Categories -->
                                    <aside class="single_sidebar_widget search_widget">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Posts">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                            </span>
                                        </div><!-- /input-group -->
                                        <div class="br"></div>
                                    </aside>
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                                        <h4>Charlie Barber</h4>
                                        <p>Senior blog writer</p>
                                        <div class="social_icon">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-github"></i></a>
                                            <a href="#"><i class="fa fa-behance"></i></a>
                                        </div>
                                        <p>Boot camps have its supporters andit sdetractors. Some people do not understand why
                                            you
                                            should have to spend money on boot camp when you can get. Boot camps have itssuppor
                                            ters andits detractors.</p>
                                        <div class="br"></div>
                                    </aside>
                                    
                                    <aside class="single_sidebar_widget post_category_widget">
                                        <h4 class="widget_title">Post Categories</h4>
                                        <ul class="list cat-list">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="{{ route('blog') }}" class="d-flex justify-content-between">
                                                        <p>{{ $category->name }}</p>
                                                        <p>{{ $category->blogs()->count() }}</p> <!-- Số lượng bài viết trong danh mục -->
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="br"></div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </section>
        <!--================Blog Area =================-->
@endsection
{{-- <script>
    $(document).ready(function () {
        $(".related-post-link").click(function (e) {
            e.preventDefault(); // Ngừng hành động mặc định (tải lại trang)

            var blogId = $(this).data("id"); // Lấy ID bài viết liên quan

            $.ajax({
                url: "{{ route('blogdetail') }}", // URL của route blogdetail
                method: "GET",
                data: { id: blogId }, // Gửi ID qua dữ liệu yêu cầu AJAX
                success: function(response) {
                    // Cập nhật nội dung bài viết
                    $(".blog_details").html(response.blog);
                },
                error: function() {
                    alert("Có lỗi xảy ra, vui lòng thử lại!");
                }
            });
        });
    });
</script> --}}
   