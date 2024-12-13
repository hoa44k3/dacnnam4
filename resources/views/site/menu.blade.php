@extends('site.master')

@section('title','Trang chủ')
@section('body')
<!-- Start banner bottom -->
<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
    <div class="col-lg-8 offset-lg-4">
        <div class="banner_content">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1>Danh sách thực đơn</h1>
                    <p>Tổng hợp tất cả các món ăn và đồ uống có trong nhà hàng!</p>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="page-link-wrap">
                        <div class="page_link">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('menu') }}">Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner bottom -->
<!--================ End Home Banner Area =================-->

<!--================ Menu Area =================-->
<section class="menu_area section_gap">
    <div class="container">
        <div class="row menu_inner">
            <div class="col-lg-5">
                <div class="menu_list">
                    <h1>Appetizer</h1>
                    <ul class="list">
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                    </ul>
                </div>

                <div class="menu_list">
                    <h1>Side Dishes</h1>
                    <ul class="list">
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="menu_list res-mr">
                    <h1>Main Courses</h1>
                    <ul class="list">
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                    </ul>
                </div>
                <div class="menu_list">
                    <h1>Desserts</h1>
                    <ul class="list">
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                        <li>
                            <h4>Ham & Potato Sandwiches
                                <span>$20</span>
                            </h4>
                            <p>(French bread baguette, cooked ham, potato salad)</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Menu Area =================-->
@endsection