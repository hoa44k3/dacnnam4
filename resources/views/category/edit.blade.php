@extends('admin.master')
@section('body')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $category->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
