// View: resources/views/favorites/create.blade.php

@extends('admin.master')

@section('body')

<div class="card">
    <div class="card-header">
        <h4>Thêm Favorite</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('favorites.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dish_id">Dish</label>
                <select name="dish_id" id="dish_id" class="form-control">
                    <option value="">Select Dish</option>
                    @foreach ($dishes as $dish)
                        <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Favorite</button>
        </form>
    </div>
</div>

@endsection
