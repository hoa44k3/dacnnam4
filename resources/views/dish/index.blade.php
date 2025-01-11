@extends('admin.master')
@section('title', 'Dish Manager')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách món ăn</h4>
      
        <a href="{{ route('dish.create') }}" class="btn btn-primary mb-3">
            Thêm Món Ăn
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên món ăn</th>
                        <th>Vùng miền</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th> 
                        <th>Nguồn gốc</th>
                        <th>Nguyên liệu</th>
                        <th>Cách làm</th>
                        <th>Giá trị</th>
                        <th>Danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <td>{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>  
                            <td>{{ $dish->region->name ?? 'Không xác định' }}</td> 
                            <td>
                                <img src="{{ asset('storage/' . $dish->image) }}" alt="Image" style="width: 100px; height: 70px; object-fit: cover;">
                            </td>
                            <td>{{ Str::limit($dish->description, 50, '...') }}</td> 
                            <td>{{ Str::limit($dish->origin, 50, '...') }}</td> 
                            <td>{{ Str::limit($dish->ingredients, 50, '...') }}</td> 
                            <td>{{ Str::limit($dish->preparation, 50, '...') }}</td> 
                            <td>{{ Str::limit($dish->cultural_value, 50, '...') }}</td> 
                            <td>{{ $dish->category->name ?? 'Không có danh mục' }}</td>
                            <td>
                                <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-info btn-sm" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('dish.destroy', $dish->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
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
