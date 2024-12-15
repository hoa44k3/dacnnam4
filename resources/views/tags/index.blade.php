
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
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $tag->id }}">Xóa</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const tagId = this.getAttribute('data-id');
                if (confirm('Bạn có chắc chắn muốn xóa thẻ tag này?')) {
                    fetch(`/tags/${tagId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Xóa thành công');
                        // Xóa hàng trong bảng mà không tải lại trang
                        document.querySelector(`button[data-id="${tagId}"]`).closest('tr').remove();
                    } else {
                        alert('Có lỗi xảy ra khi xóa!');
                    }
                });


                }
            });
        });
    });
</script>


