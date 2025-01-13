@extends('admin.master')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Danh sách bình luận</h4>
        {{-- <a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">Thêm comment</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Bình luận</th>
                        <th>Thuộc món ăn</th>
                      
                        <th>Người bình luận</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->dish ? $comment->dish->name : 'N/A' }}</td>
                        {{-- <td>{{ $comment->blog ? $comment->blog->name : 'N/A' }}</td> --}}
                        <td>{{ $comment->user_id ? $comment->user->name : 'N/A' }}</td>
                        <td>
                            {{-- <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Sửa</a> --}}
                            {{-- <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form> --}}
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline delete-form" title="Xóa">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
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

@section('scripts')
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this comment?')) {
                this.submit();
            }
        });
    });
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this comment?')) {
                fetch(this.action, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                }).then(response => {
                    if (response.ok) {
                        alert('Comment deleted successfully');
                        this.closest('tr').remove();
                    }
                }).catch(error => {
                    alert('Error deleting comment');
                });
            }
        });
    });
</script>
@endsection
