@extends('admin.master')
@section('title', 'Thêm Customer')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Thêm Customer Mới</h4>
    </div>
    <div class="card-body">
        <!-- Thêm enctype="multipart/form-data" để hỗ trợ tải lên file -->
        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Customer</button>
        </form>
    </div>
</div>

@endsection
