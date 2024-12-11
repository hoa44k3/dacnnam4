<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'dish_id', 'customer_id'];
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    // Quan hệ nhiều-một với Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}