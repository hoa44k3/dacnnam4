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
        return $this->belongsTo(Customer::class);
    }

}
