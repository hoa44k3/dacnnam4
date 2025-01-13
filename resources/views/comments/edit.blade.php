@extends('admin.master')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Sửa comment</h4>
    </div>
    <div class="card-body">
    <form action="{{ route('comments.update', $comment->id) }}" method="POST"enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ $comment->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="dish_id">Dish</label>
            <select name="dish_id" id="dish_id" class="form-control">
                <option value="">Select Dish</option>
                @foreach ($dishes as $dish)
                    <option value="{{ $dish->id }}" {{ $dish->id == $comment->dish_id ? 'selected' : '' }}>{{ $dish->name }}</option>
                @endforeach
            </select>
        </div>
       
        <div class="form-group">
            <label for="user_id">Customer</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $comment->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
</div>
@endsection
