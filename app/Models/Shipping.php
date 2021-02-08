<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Shipping extends Model
{
    public function order()
    {
        return $this->hasOne(Order::class, 'shipping_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
