<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'status'];

    // Nếu không sử dụng timestamps (created_at, updated_at)
    public $timestamps = false;

    // Nếu tên bảng là khác
    // protected $table = 'category';

    // Nếu có khóa chính khác
    // protected $primaryKey = 'your_primary_key';

    // Chuyển đổi kiểu dữ liệu
    protected $casts = [
        'status' => 'boolean',
    ];
    use HasFactory;

//   public function dishes()
//     {
//         return $this->belongsToMany(Dish::class, 'category_dish');
//     }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    // Category.php
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

}
