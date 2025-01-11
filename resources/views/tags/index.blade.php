
@extends('admin.master')
@section('title', 'Tag Manager')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh thẻ </h4>
        <!-- Nút Thêm Món Ăn -->
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">
            Thêm thẻ
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="likesTable">
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                {{-- <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $tag->id }}">Xóa</button> --}}
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
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
@endsection
<script>
    $(document).ready(function () {
        // Xử lý sự kiện click nút xóa
        $('.btn-delete').click(function () {
            const tagId = $(this).data('id'); // Lấy ID thẻ
            const row = $(this).closest('tr'); // Dòng cần xóa

            if (confirm('Bạn có chắc chắn muốn xóa thẻ tag này?')) {
                $.ajax({
                url: `/tags/${tagId}`,
                type: 'POST', // Chuyển sang POST
                data: {
                    _method: 'DELETE', // Bổ sung _method để server hiểu là DELETE
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
                },
                success: function (response) {
                    alert('Xóa thành công');
                    row.remove(); // Xóa dòng khỏi bảng
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.message || 'Có lỗi xảy ra khi xóa!');
                    console.error(xhr.responseJSON);
                }
            });

            }
        });
    });
</script>



