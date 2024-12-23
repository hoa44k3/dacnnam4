@extends('admin.master')

@section('body')
<div class="card">
    <div class="card-header">
        <h4>Thêm Đơn Hàng</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="order_code">Mã đơn hàng</label>
                <input type="text" class="form-control" id="order_code" name="order_code" value="{{ $orderCode }}" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="customer_id">Khách hàng</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <option value="">-- Chọn khách hàng --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Thêm phần chọn sản phẩm -->
            <div class="form-group mb-3">
                <label for="dishes">Sản phẩm</label>
                <select name="dishes[]" id="dishes" class="form-control" multiple required>
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}" data-price="{{ $dish->price }}">
                            {{ $dish->name }} - {{ number_format($dish->price, 0, ',', '.') }} đ
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Hiển thị phần nhập số lượng cho từng món ăn -->
            <div id="dish-quantities"></div>

            <!-- Hiển thị tổng tiền -->
            <div class="form-group mb-3">
                <label for="total">Tổng tiền</label>
                <input type="number" name="total" id="total" class="form-control" value="{{ old('total') }}" readonly>
            </div>

            <!-- Trạng thái đơn hàng -->
            <div class="form-group mb-3">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dishSelect = document.getElementById('dishes');
        const dishQuantitiesContainer = document.getElementById('dish-quantities');
        const totalInput = document.getElementById('total');

        // Hàm tính tổng tiền
        function calculateTotal() {
            let total = 0;
            const selectedDishes = dishSelect.selectedOptions;
            const quantityInputs = document.querySelectorAll('.dish-quantity'); // Chọn các input số lượng
            
            selectedDishes.forEach((dish, index) => {
                const price = parseInt(dish.getAttribute('data-price'));
                const quantity = parseInt(quantityInputs[index].value) || 1; // Giá trị mặc định là 1 nếu không nhập
                total += price * quantity;
            });

            totalInput.value = total; // Cập nhật giá trị tổng tiền
        }

        // Khi chọn sản phẩm
        dishSelect.addEventListener('change', function () {
            // Xóa hết các input số lượng cũ
            dishQuantitiesContainer.innerHTML = '';

            // Thêm input số lượng cho từng món được chọn
            const selectedDishes = dishSelect.selectedOptions;
            selectedDishes.forEach(dish => {
                const quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.name = 'quantity[]';
                quantityInput.classList.add('form-control', 'dish-quantity');
                quantityInput.min = '1';
                dishQuantitiesContainer.appendChild(quantityInput);
            });

            // Tính lại tổng tiền
            calculateTotal();
        });

        // Cập nhật tổng tiền khi nhập số lượng
        dishQuantitiesContainer.addEventListener('input', function () {
            calculateTotal();
        });
    });
</script>
@endsection
