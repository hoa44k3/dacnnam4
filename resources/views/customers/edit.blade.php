@extends('admin.master')
@section('title', 'Sửa Customer')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Sửa Customer</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
                
                <!-- Hiển thị ảnh cũ nếu có -->
                @if($customer->avatar)
                    <div class="mt-2">
                        <label>Current Avatar:</label>
                        <img src="{{ asset('storage/' . $customer->avatar) }}" alt="Avatar" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $customer->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $customer->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $customer->address) }}">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="male" {{ $customer->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $customer->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $customer->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Customer</button>
        </form>
    </div>
</div>

@endsection
