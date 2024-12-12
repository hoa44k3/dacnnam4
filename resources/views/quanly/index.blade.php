{{-- @extends('admin.master')
@section('body')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="my-3">Quản lý Đơn hàng, Giỏ hàng và Thanh toán</h4>
            <ul class="nav nav-tabs" id="adminTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="true">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cart-tab" data-bs-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="payment-tab" data-bs-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Thanh toán</a>
                </li>
            </ul>
            <div class="tab-content" id="adminTabsContent">
                <!-- Tab Đơn hàng -->
                <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Danh sách đơn hàng</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày đặt</th>
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
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Cập nhật</a>
                                                <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $order->id }}">Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Tab Giỏ hàng -->
                <div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Danh sách giỏ hàng</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cart->customer_name }}</td>
                                            <td>{{ $cart->product_name }}</td>
                                            <td>{{ $cart->quantity }}</td>
                                            <td>{{ number_format($cart->total, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ $cart->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('cart.edit', $cart->id) }}" class="btn btn-primary btn-sm">Cập nhật</a>
                                                <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $cart->id }}">Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Tab Thanh toán -->
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Danh sách thanh toán</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã thanh toán</th>
                                        <th>Khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hình thức</th>
                                        <th>Ngày thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->payment_code }}</td>
                                            <td>{{ $payment->customer_name }}</td>
                                            <td>{{ number_format($payment->total, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ $payment->method }}</td>
                                            <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}
