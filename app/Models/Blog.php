<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','description','position','status','category_id','video'];
    public function tags()
    {
        return $this->hasMany(Tag::class, 'blog_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'blog_id');
    // }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    

}
