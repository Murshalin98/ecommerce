<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

function TotalCarts()
    {
        return $carts = Cart::where('generate_cart_id', Cookie::get('cart_id'))->get();
    }
