<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
// public function blogs()
// {
//     return $this->hasMany(Blog::class);
// }

}
