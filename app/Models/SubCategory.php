<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\Models\Category;

class SubCategory extends Model
{
    // function get_category(){
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    protected $fillable = [
        'subcategory_name','category_id','slug','updated_at'
    ];

    use SoftDeletes;

    function get_category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    function get_product()
    {
        return $this->hasOne(Productss::class, 'subcategory_id');
    }

}
