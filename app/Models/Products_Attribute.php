<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products_Attribute extends Model
{
    function get_color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    function get_size()
    {
        return $this->belongsTo(ProductSize::class, 'size_id');
    }

    function product()
    {
        return $this->belongsTo(Productss::class, 'product_id');
    }

    protected $fillable = [
        'color_id', 'size_id'
    ];
}
