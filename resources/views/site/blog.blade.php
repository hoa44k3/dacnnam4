
@extends('site.master')

@section('title','Trang chủ')
@section('body')

        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>Social Life</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>Politics</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>Be a part of politics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html">
                                        <h5>Food</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>Let the food be finished</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->

        <!--================Blog Area =================-->
        {{-- <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            @foreach ($blogs as $blog)
                                <article class="row blog_item">
                                    <div class="col-md-4">
                                        <div class="blog_info text-right">
                                            <ul class="blog_meta list">
                                                <li><a href="#">Mark Wiens<i class="lnr lnr-user"></i></a></li>
                                                <li>
                                                    <a href="#">
                                                        {{ $blog->created_at ? $blog->created_at->format('d M, Y') : 'Unknown Date' }}
                                                    </a>
                                                </li>
                                                
                                                <li><a href="#">{{ $blog->view_count ?? 0 }} Views<i class="lnr lnr-eye"></i></a></li>

                                                <li><a href="#">{{ $blog->comments->count() }} Comments<i class="lnr lnr-bubble"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="blog_post">
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}">
                                            <div class="blog_details">
                                                <a href="{{ route('blogdetail', ['id' => $blog->id]) }}">
                                                    
                                                    <h2>{{ $blog->name }}</h2>
                                                </a>
                                                <p>{{ $blog->description }}</p>
                                                <a href="{{ route('blogdetail', ['id' => $blog->id]) }}" class="blog_btn">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>  
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4"> <!-- Mỗi bài viết chiếm 1/3 chiều rộng -->
                            <article class="blog_item">
                                <div class="blog_post">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" class="img-fluid">
                                    <div class="blog_details">
                                        <a href="{{ route('blogdetail', ['id' => $blog->id]) }}">
                                            <h2>{{ $blog->name }}</h2>
                                        </a>
                                        <p>{{ $blog->description }}</p>
                                        
                                        <!-- Hiển thị thẻ tag -->
                                        <ul class="blog_tags">
                                            @foreach($blog->tags as $tag)
                                                <li><a href="#">{{ $tag->name }}</a></li> <!-- Thẻ tag -->
                                            @endforeach
                                        </ul>
                                        
                                        <!-- Hiển thị danh mục -->
                                        <p class="blog_category">
                                            Thuộc: <a href="#">{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</a>
                                        </p>
                                        
                                        <!-- Hiển thị ngày tạo và lượt xem -->
                                        <ul class="blog_meta list">
                                            {{-- <li><i class="lnr lnr-calendar-full"></i> {{ $blog->created_at ? $blog->created_at->format('d M, Y') : 'Unknown Date' }}</li> --}}
                                            <li><i class="lnr lnr-eye"></i> {{ $blog->view_count }} Lượt xem</li>
                                        </ul>
                                        
                                        <a href="{{ route('blogdetail', ['id' => $blog->id]) }}" class="blog_btn">Chi tiết</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                
                <!-- Paginate -->
                <div class="row">
                    <div class="col-12 text-center">
                        {{ $blogs->links() }} <!-- Hiển thị phân trang nếu có nhiều bài viết -->
                    </div>
                </div>
            </div>
        </section>
        
        
@endsection
  