@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách giỏ hàng</h4>
        <a href="{{ route('carts.create') }}" class="btn btn-success btn-sm">Thêm mới</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cart->customer ? $cart->customer->name : 'Chưa có khách hàng' }}</td>
                            <td>{{ $cart->product ? $cart->product->name : 'Sản phẩm không tồn tại' }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ number_format($cart->total, 0, ',', '.') }} VND</td>
                            <td>
                                <a href="{{ route('carts.edit', $cart->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" style="display:inline;">
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
