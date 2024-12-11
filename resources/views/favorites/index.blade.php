

@extends('admin.master')

@section('body')

<div class="card">
    <div class="card-header">
        <h4>Danh sách Favorite</h4>
        <a href="{{ route('favorites.create') }}" class="btn btn-primary mb-3">Thêm Favorite</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Dish</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favorites as $favorite)
                        <tr>
                            <td>{{ $favorite->customer->name }}</td>
                            <td>{{ $favorite->dish->name }}</td>
                            <td>
                                <a href="{{ route('favorites.edit', $favorite->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" style="display:inline;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

@section('scripts')
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this favorite?')) {
                fetch(this.action, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                }).then(response => {
                    if (response.ok) {
                        alert('Favorite deleted successfully');
                        this.closest('tr').remove();
                    }
                }).catch(error => {
                    alert('Error deleting favorite');
                });
            }
        });
    });
</script>
@endsection
