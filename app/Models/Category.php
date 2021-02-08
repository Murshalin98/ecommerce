<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\SubCategory;

class Category extends Model
{
    // protected $fillable = [
    //     'category_name', 'slug'
    // ];

    use SoftDeletes;

    // function get_subcategory(){
    //     return $this->hasOne(SubCategory::class, 'category_id');
    // }
}
