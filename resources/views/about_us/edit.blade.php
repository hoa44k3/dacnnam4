@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Sửa </h4>
    </div>
    <div class="card-body">
        <form action="{{ route('about_us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ old('title', $aboutUs->title) }}" class="form-control" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Content -->
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required>{{ old('content', $aboutUs->content) }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mission -->
            <div class="form-group">
                <label for="mission">Mission:</label>
                <textarea name="mission" class="form-control">{{ old('mission', $aboutUs->mission) }}</textarea>
                @error('mission')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Vision -->
            <div class="form-group">
                <label for="vision">Vision:</label>
                <textarea name="vision" class="form-control">{{ old('vision', $aboutUs->vision) }}</textarea>
                @error('vision')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image_path">Image:</label>
                <input type="file" name="image_path" class="form-control">
                @if($aboutUs->image_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $aboutUs->image_path) }}" alt="Current Image" width="100">
                    </div>
                @endif
                @error('image_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
