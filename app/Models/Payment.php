<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['payment_code', 'customer_id', 'total', 'method'];
    // Model Payment
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
