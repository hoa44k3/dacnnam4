@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách thanh toán</h4>
        <a href="{{ route('payments.create') }}" class="btn btn-success btn-sm">Thêm mới</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã thanh toán</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->payment_code }}</td>
                            <td>{{ $payment->customer ? $payment->customer->name : 'Chưa có khách hàng' }}</td>
                            <td>{{ number_format($payment->total, 0, ',', '.') }} VND</td>
                            <td>{{ $payment->method }}</td>
                            <td>
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
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
