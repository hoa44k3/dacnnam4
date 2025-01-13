<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'status'];
    public $timestamps = false;

    // Chuyển đổi kiểu dữ liệu
    protected $casts = [
        'status' => 'boolean',
    ];
    use HasFactory;
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

}
