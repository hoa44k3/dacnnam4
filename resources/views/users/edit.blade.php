@extends('admin.master')

@section('title', 'Edit User')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Chỉnh sửa người dùng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password (Leave blank if not changing):</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
