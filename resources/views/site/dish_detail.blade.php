@extends('site.master')

@section('body')
<style>
    .dish_detail_area {
        padding: 80px 0;
        margin-top: 100px;
    }
    .dish_image {
    display: flex;
    justify-content: center; /* Căn giữa hình ảnh */
    margin-top: 30px; 
    margin-bottom: 30px;
}
    .dish_image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .dish_info {
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        margin-top: 30px;      /* Khoảng cách riêng cho phần thông tin món ăn */
        padding-left: 20px; /* Khoảng cách giữa phần thông tin và ảnh */
    }

    .dish_info h2 {
        font-size: 34px;
        font-weight: bold;
        color: #d9534f;
        margin-bottom: 20px;
    }

    .dish_description {
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 15px;
    }

    .category_info {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .category_info a {
        color: #007bff;
        text-decoration: none;
    }

    .category_info a:hover {
        text-decoration: underline;
    }

    .dish_details_section {
        margin-top: 30px;
    }

    .dish_details_section h3 {
        font-size: 26px;
        color: #d9534f;
        margin-bottom: 15px;
    }

    .dish_details_section p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .page-link-wrap {
        margin-top: 20px;
    }


    .faq_form {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

.faq_form h3 {
    font-size: 24px;
    font-weight: bold;
    color: #d9534f;
    margin-bottom: 20px;
}

.faq_form input,
.faq_form textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.faq_form input:focus,
.faq_form textarea:focus {
    border-color: #d9534f;
    outline: none;
}

.faq_form button {
    background-color: #d9534f;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.faq_form button:hover {
    background-color: #c9302c;
}

.faq_item p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 10px;
}

.faq_item strong {
    font-weight: bold;
    color: #d9534f;
}


.faq_answer {
    display: none;
    margin-top: 10px;
    color: #555;
    font-style: italic;
    padding-left: 20px;
}

.faq_question {
    cursor: pointer;
    color: #d9534f;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
}

.faq_question:hover {
    color: #c9302c;
}

</style>

<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
    <div class="col-lg-8 offset-lg-4">
        <div class="banner_content">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1>Chi tiết món ăn</h1>
                    <p>Tham khảo nguồn gốc của các món ăn và giá trị văn hóa!</p>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="page-link-wrap">
                        <div class="page_link">
                           
                            <a href="#">Món ăn</a>
                            <a href="#">Chi tiết món ăn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="dish_detail_area">
    <div class="container">
        <div class="row">
            <!-- Thông tin món ăn -->
            <div class="col-lg-6 order-lg-2">
                <div class="dish_info">
                    <h2>{{ $dish->name }}</h2>
                    <p class="dish_description">{{ $dish->description }}</p>
                    <p class="category_info">Thuộc: <a href="#">{{ $dish->category->name }}</a></p>
                    <div class="dish_details_section">
                        <h3>Thông tin chi tiết</h3>
                        <p><strong>Nguồn gốc:</strong> {{ $dish->origin }}</p>
                        <p><strong>Nguyên liệu:</strong> {{ $dish->ingredients }}</p>
                        <p><strong>Chuẩn bị:</strong> {{ $dish->preparation }}</p>
                        <p><strong>Giá trị văn hóa:</strong> {{ $dish->cultural_value }}</p>
                    </div>
                </div>
            </div>
            <!-- Hình ảnh món ăn -->
            <div class="col-lg-6 order-lg-1">
                <div class="dish_image">
                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                    @else
                        <img src="{{ asset('assets/img/default-dish.jpg') }}" alt="No image available">
                    @endif
                </div>
                <div class="faq_section">
                    <h3>Giải đáp câu hỏi thường gặp</h3>
                    @foreach($faqs as $faq)
                    <div class="faq_item">
                        <p class="faq_question"><strong>Câu hỏi:</strong> {{ $faq->question }}</p>
                        <p class="faq_answer" style="display: none;"><strong>Đáp án:</strong> {{ $faq->answer ?? 'Đang chờ trả lời' }}</p>
                    </div>
                @endforeach
                
                
                    <!-- Form liên hệ hỏi đáp -->
                    <div class="faq_form">
                        <h3>Đặt câu hỏi của bạn:</h3>
                        <form action="{{ route('faq.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                            <input type="text" name="name" placeholder="Tên của bạn" required>
                            <textarea name="question" rows="4" placeholder="Câu hỏi của bạn" required></textarea>
                            <button type="submit">Gửi câu hỏi</button>
                        </form>
                    </div>

                    <!-- Hiển thị câu hỏi mới sau khi gửi -->
                    @if(session('new_faq'))
                        <div class="faq_item">
                            <p><strong>Câu hỏi:</strong> {{ session('new_faq')->question }}</p>
                            <p><strong>Đáp án:</strong> Đang chờ trả lời</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
       
        const questions = document.querySelectorAll('.faq_question');

        questions.forEach(function (question) {
            question.addEventListener('click', function () {
            
                const answer = question.nextElementSibling;
                if (answer.style.display === 'none') {
                    answer.style.display = 'block';
                } else {
                    answer.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection