@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách vùng miền</h4>
        <a href="{{ route('regions.create') }}" class="btn btn-primary mb-3">Thêm regions</a>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{ $region->name }}</td>
                            <td>{{ $region->description }}</td>
                            <td>
                                <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
