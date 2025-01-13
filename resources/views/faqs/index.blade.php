@extends('admin.master')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Quản lý Câu hỏi thường gặp </h1>

            <!-- Thông báo -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form thêm câu hỏi -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Thêm câu hỏi mới</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('faqs.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="question">Câu hỏi:</label>
                            <input type="text" id="question" name="question" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Thêm câu hỏi</button>
                    </form>
                </div>
            </div>

            <!-- Danh sách câu hỏi -->
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách câu hỏi</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Câu hỏi</th>
                                <th>Câu trả lời</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->id }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer ?? 'Chưa trả lời' }}</td>
                                    <td>
                                        <!-- Form trả lời câu hỏi -->
                                        @if (!$faq->answer)
                                            <form method="POST" action="{{ route('faqs.answer', $faq->id) }}" class="mb-2">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea name="answer" class="form-control" rows="2" placeholder="Nhập câu trả lời" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm mt-2">Trả lời</button>
                                            </form>
                                        @endif

                                        <!-- Xóa câu hỏi -->
                                        <form method="POST" action="{{ route('faqs.destroy', $faq->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
