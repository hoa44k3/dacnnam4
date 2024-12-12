@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách đơn hàng</h4>
        <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm">Thêm mới</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->customer ? $order->customer->name : 'Chưa có khách hàng' }}</td>
                            <td>{{ number_format($order->total, 0, ',', '.') }} VND</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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
