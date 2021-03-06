<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    function blog()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
