<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','dish_id'];
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    // Thiết lập quan hệ với Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
