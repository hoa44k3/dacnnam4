@extends('admin.master')

@section('title', 'Add User')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Thêm người dùng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST"enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
@endsection
