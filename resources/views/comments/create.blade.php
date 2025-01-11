@extends('admin.master')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Thêm bình luận Mới</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="dish_id">Dish</label>
                <select name="dish_id" id="dish_id" class="form-control" required>
                    <option value="">Select Dish</option>
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Comment</button>
        </form>
    </div>
</div>

@endsection
