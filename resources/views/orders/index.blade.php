@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách đơn đặt hàng</h4>
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">
            Đặt hàng
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
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
                            <td>
                                @if($order->dishes && count($order->dishes) > 0)
                                    @foreach ($order->dishes as $dish)
                                        <p><strong>{{ $dish['name'] }}</strong></p>
                                    @endforeach
                                @else
                                    <p>Không có sản phẩm</p>
                                @endif
                            </td>
                            <td>
                                @if($order->dishes && count($order->dishes) > 0)
                                    @foreach ($order->dishes as $dish)
                                        <p>Số lượng: {{ $dish['quantity'] }}</p>
                                    @endforeach
                                @else
                                    <p>Chưa có số lượng</p>
                                @endif
                            </td>
                            <td>
                                @if($order->dishes && count($order->dishes) > 0)
                                    @php
                                        $totalAmount = 0;
                                        foreach($order->dishes as $dish) {
                                            $totalAmount += $dish['total'];
                                        }
                                    @endphp
                                    <p>{{ number_format($totalAmount, 0, ',', '.') }} đ</p>
                                @else
                                    <p>Chưa có tổng tiền</p>
                                @endif
                            </td>
                            <td>
                                @if ($order->status === 'pending')
                                    <span class="badge bg-warning text-dark">Đang chờ</span>
                                @elseif ($order->status === 'completed')
                                    <span class="badge bg-success">Hoàn thành</span>
                                @elseif ($order->status === 'cancelled')
                                    <span class="badge bg-danger">Đã hủy</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                                <!-- Nút Duyệt -->
                                @if($order->status === 'pending')
                                    <form action="{{ route('orders.approve', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                    </form>
                                @endif

                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Phân trang -->
            <div class="d-flex justify-content-center mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
