@extends('admin.master')
@section('title', 'Customer Manager')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách customer</h4>
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Thêm Customer</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr id="customer-{{ $customer->id }}">
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                                <button onclick="deleteCustomer({{ $customer->id }})" class="btn btn-danger">Delete</button>
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
        function deleteCustomer(id) {
            if (confirm("Are you sure you want to delete this customer?")) {
                $.ajax({
                    url: '/customers/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        $('#customer-' + id).remove();
                        alert(response.success);
                    }
                });
            }
        }
    </script>
@endsection
