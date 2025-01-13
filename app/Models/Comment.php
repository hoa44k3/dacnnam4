<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'dish_id', 'user_id','blog_id'];
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
