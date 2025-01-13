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
                        <td>{{ $comment->user_id ? $comment->user->name : 'N/A' }}</td>
                        <td>
                           
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

