
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
       
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4"> 
                            <article class="blog_item">
                                <div class="blog_post">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" class="img-fluid">
                                    <div class="blog_details">
                                        <a href="{{ route('blogdetail', ['id' => $blog->id]) }}">
                                            <h2>{{ $blog->name }}</h2>
                                        </a>
                                        <p>{{ $blog->description }}</p>
                                        <ul class="blog_tags">
                                            @foreach($blog->tags as $tag)
                                                <li><a href="#">{{ $tag->name }}</a></li> 
                                            @endforeach
                                        </ul>
                                        <p class="blog_category">
                                            Thuộc: <a href="#">{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</a>
                                        </p>
                                        <ul class="blog_meta list">
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
  