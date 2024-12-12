<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'dish_id',
        'quantity',
        'total',
    ];

    // Quan hệ với bảng dishes
    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }

    // Quan hệ với bảng customers
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
