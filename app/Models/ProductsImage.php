<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    protected $fillable = [
        'product_id', 'images'
    ];

    public function product(){
        return $this->belongsTo(Productss::class, 'product_id');
    }
}
