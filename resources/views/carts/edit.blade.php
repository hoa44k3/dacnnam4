@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Chỉnh sửa giỏ hàng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('carts.update', $cart->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Khách hàng</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    <option value="">Chọn khách hàng</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $cart->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dish_id">Sản phẩm</label>
                <select name="dish_id" id="dish_id" class="form-control">
                    <option value="">Chọn sản phẩm</option>
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}" {{ $cart->dish_id == $dish->id ? 'selected' : '' }}>
                            {{ $dish->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $cart->quantity }}" min="1">
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
