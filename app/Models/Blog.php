<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','description','position','status','category_id','video','post_type_id'];
    public function tags()
    {
        return $this->hasMany(Tag::class, 'blog_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function postType()
    {
        return $this->belongsTo(PostType::class, 'post_type_id');
    }
    // Trong Blog.php model


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    // public function region()
    // {
    //     return $this->belongsTo(Region::class);
    // }
    

}
