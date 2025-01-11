@extends('admin.master')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Danh sách comment</h4>
        {{-- <a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">Thêm comment</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Content</th>
                        <th>Dish</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->dish ? $comment->dish->name : 'N/A' }}</td>
                        <td>{{ $comment->user_id ? $comment->user->name : 'N/A' }}</td>
                        <td>
                            {{-- <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Edit</a> --}}
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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
