<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productss extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'category_id',
        'subcategory_id',
        'summary',
        'thumbnail',
        'description'
    ];

    function get_category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    function get_subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function product_images(){
        return $this->hasMany(ProductsImage::class, 'product_id');
    }

    public function products_attributes()
    {
        return $this->hasMany(Products_Attribute::class, 'product_id');
    }

    function carts()
    {
        return $this->hasMany(Cart::class, 'cart_id');
    }

    // function get_color()
    // {
    //     return $this->belongsTo(Color::class, 'color_id');
    // }

    public function order()
    {
        return $this->hasOne(Order::class, 'product_id');
    }
}
