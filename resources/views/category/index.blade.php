@extends('admin.master')
@section('body')

<div class="card">
    <div class="card-header">
      <h4 class="card-title">Category Manager</h4>
    </div>
    <div class="card-body">
     
      <div class="table-responsive">
        <table
          id="basic-datatables"
          class="display table table-striped table-hover"
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Status</th>
              <th>Created_at</th>
              <th>Updated_at</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ \Illuminate\Support\Str::limit($item->description, 50) }}</td>
              <td>{{ $item->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
              <td>{{ \Carbon\Carbon::parse($item->create_at)->format('d/m/Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($item->updated_at_at)->format('d/m/Y') }}</td>
              <td>
                <!-- Nút Sửa -->
                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    Sửa
                </a>

                <!-- Nút Xóa -->
                <form action="{{ route('category.destroy', $item->id) }}" method="POST" style="display: inline;">
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
  <script>
    $(document).on('click', '.delete-category', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this category?')) {
            const url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    alert('Failed to delete category.');
                }
            });
        }
    });
  </script>
@endsection

