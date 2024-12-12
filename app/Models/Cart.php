<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'dish_id', 'quantity', 'total'];
    // Model Cart
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

}
