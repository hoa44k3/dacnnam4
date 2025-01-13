@extends('admin.master')
@section('body')

<div class="card">
    <div class="card-header">
        <h4>Danh sách danh mục</h4>
        
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">
            Thêm danh mục
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Blogs Count</th> 
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 5000) }}</td>
                        <td>{{ $item->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y') }}</td>
                        <td>{{ $item->blogs_count }}</td> 
                        <td>
                            
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Sửa
                            </a>
                            <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="d-inline delete-form" title="Xóa">
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
