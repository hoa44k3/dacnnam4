
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
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            @foreach ($blogs as $blog)
                                <article class="row blog_item">
                                    <div class="col-md-3">
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
                                                <a href="{{ route('blogdetail', $blog->id) }}">
                                                    <h2>{{ $blog->name }}</h2>
                                                </a>
                                                <p>{{ $blog->description }}</p>
                                                <a href="{{ route('blogdetail', $blog->id) }}" class="blog_btn">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                            
                            <!-- Phân trang -->
                            <nav class="blog-pagination justify-content-center d-flex">
                                {{ $blogs->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>  
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
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
                                <h4>Ông Charlie Barber</h4>
                                <p>Thông tin liên hệ</p>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <p>Đầu bếp chính, là người luôn tận tâm với công việc, luôn chu đáo và chú trong tới thành phần của thức ăn</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Popular Posts</h3>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>Space The Final Frontier</h3>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post2.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>The Amazing Hubble</h3>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post3.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>Astronomy Or Astrology</h3>
                                        </a>
                                        <p>03 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post4.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>Asteroids telescope</h3>
                                        </a>
                                        <p>01 Hours ago</p>
                                    </div>
                                </div>
                                <div class="br"></div>
                            </aside>

                            <aside class="single_sidebar_widget ads_widget">
                                <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Categories</h4>
                                <ul class="list cat-list">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('blog', ['category' => $category->id]) }}" class="d-flex justify-content-between">
                                                <p>{{ $category->name }}</p>
                                                <p>{{ $category->blogs_count }}</p> <!-- Số lượng bài viết trong danh mục -->
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="br"></div>
                            </aside>
                            
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                    Here, I focus on a range of items and features that we use in life without
                                    giving them a second thought.
                                </p>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns">Subcribe</a>
                                </div>
                                <p class="text-bottom">You can unsubscribe at any time</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Các thẻ tìm kiếm</h4>
                                <ul class="list">
                                    @foreach (\App\Models\Tag::all() as $tag)
                                        <li><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </aside>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
@endsection
  