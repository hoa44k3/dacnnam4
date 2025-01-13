
@extends('admin.master')
@section('title', 'Tag Manager')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh thẻ </h4>
        <!-- Nút Thêm Món Ăn -->
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">
            Thêm thẻ
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="likesTable">
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="d-inline delete-form" title="Xóa">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
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




