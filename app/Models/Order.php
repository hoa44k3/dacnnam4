<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_code', 'customer_id', 'total', 'status'];
    // Model Order
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
// Order.php (Model)
    // public function dishes()
    // {
    //     return $this->belongsToMany(Dish::class)->withPivot('total');
    // }
// Order.php
protected $casts = [
    'dishes' => 'array',  // Chuyển đổi dữ liệu JSON thành mảng
];
public function dishes()
{
    return $this->belongsToMany(Dish::class)->withPivot('quantity');
}

}
