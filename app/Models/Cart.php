<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'quantity', 'updated_at'
    ];

    public function products()
    {
        return $this->belongsTo(Productss::class, 'product_id');
    }
}
