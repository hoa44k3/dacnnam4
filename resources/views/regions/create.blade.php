@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Thêm regions Mới</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('regions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>      
@endsection
