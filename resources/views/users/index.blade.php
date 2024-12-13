@extends('admin.master')

@section('title', 'User Management')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách người dùng</h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Thêm người dùng</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr id="user-{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td>
                                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/img/default-avatar.png') }}" alt="{{ $user->name }}" width="50">

                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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