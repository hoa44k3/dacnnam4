@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Thêm giỏ hàng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('carts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Khách hàng</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    <option value="">Chọn khách hàng</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dish_id">Sản phẩm</label>
                <select name="dish_id" id="dish_id" class="form-control">
                    <option value="">Chọn sản phẩm</option>
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
@endsection
