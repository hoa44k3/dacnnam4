
@extends('admin.master')

@section('body')

<div class="card">
    <div class="card-header">
        <h4>Sửa Favorite</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('favorites.update', $favorite->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $favorite->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dish_id">Dish</label>
                <select name="dish_id" id="dish_id" class="form-control">
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}" {{ $favorite->dish_id == $dish->id ? 'selected' : '' }}>
                            {{ $dish->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Favorite</button>
        </form>
    </div>
</div>

@endsection

           
