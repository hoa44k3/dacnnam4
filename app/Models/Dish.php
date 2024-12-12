<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    /**
     * Các trường có thể được gán giá trị hàng loạt.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'description',
        'image',
        'category_id',
        'availability',
    ];
 
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function orders()
{
    return $this->belongsToMany(Order::class)->withPivot('quantity');
}

}
