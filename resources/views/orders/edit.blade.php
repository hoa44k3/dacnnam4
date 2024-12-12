@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Chỉnh Sửa Đơn Hàng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="order_code">Mã đơn hàng</label>
                <input type="text" name="order_code" id="order_code" class="form-control" value="{{ $order->order_code }}" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="customer_id">Khách hàng</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <option value="">-- Chọn khách hàng --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="dishes">Sản phẩm</label>
                <select name="dishes[]" id="dishes" class="form-control" multiple required>
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}" 
                                {{ in_array($dish->id, $selectedDishIds) ? 'selected' : '' }} 
                                data-price="{{ $dish->price }}">
                            {{ $dish->name }} - {{ number_format($dish->price, 0, ',', '.') }} đ
                        </option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group mb-3" id="dish-quantities">
                <label for="quantity">Số lượng</label>
                @foreach ($order->dishes as $dish)
                    <input type="number" name="quantity[]" class="form-control" value="{{ $dish->pivot->quantity }}" min="1" required>
                @endforeach
            </div>

            <div class="form-group mb-3">
                <label for="total">Tổng tiền</label>
                <input type="number" name="total" id="total" class="form-control" value="{{ $order->total }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dishSelect = document.getElementById('dishes');
        const quantityInputs = document.querySelectorAll('#dish-quantities input');
        const totalInput = document.getElementById('total');
        
        function calculateTotal() {
            let total = 0;
            const selectedDishes = dishSelect.selectedOptions;
            const quantities = document.querySelectorAll('#dish-quantities input');
            
            selectedDishes.forEach((dish, index) => {
                const price = parseInt(dish.getAttribute('data-price'));
                const quantity = quantities[index] ? parseInt(quantities[index].value) : 1;
                total += price * quantity;
            });
            
            totalInput.value = total;
        }

        dishSelect.addEventListener('change', function () {
            const selectedDishes = dishSelect.selectedOptions;
            const dishQuantitiesContainer = document.getElementById('dish-quantities');
            
            dishQuantitiesContainer.innerHTML = '<label for="quantity">Số lượng</label>';
            
            selectedDishes.forEach(dish => {
                const quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.name = 'quantity[]';
                quantityInput.classList.add('form-control');
                quantityInput.min = '1';
                dishQuantitiesContainer.appendChild(quantityInput);
            });
            
            calculateTotal();
        });

        document.getElementById('dish-quantities').addEventListener('input', function () {
            calculateTotal();
        });
    });
</script>
@endsection
