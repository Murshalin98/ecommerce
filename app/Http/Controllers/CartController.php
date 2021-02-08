<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class CartController extends Controller
{
    public function single_cart($id)
    {
        // $old_cookie_id = Cookie::get('cart_id');

        // if ($old_cookie_id) {
        //     $cart = new Cart;
        //     $cart->product_id = $id;
        //     $cart->generate_cart_id = $old_cookie_id;
        //     $cart->save();
        // }
        // else {
        //     $generate = Str::random(3).'_'.rand(1, 100000);
        //     Cookie::queue('cart_id', $generate , 10);
        //     $cart = new Cart;
        //     $cart->product_id = $id;
        //     $cart->generate_cart_id = $generate;
        //     $cart->save();
        // }

        $old_cookie_id = Cookie::get('cart_id');

        // return $cart_data = Cart::where('generate_cart_id', $old_cookie_id)->get();

        if ($old_cookie_id) {
            $generate = $old_cookie_id;
        }
        else{
            $generate = Str::upper('Cart').'_'.rand(1, 100000);
            Cookie::queue('cart_id', $generate , 10080);
        }

        if (Cart::where('generate_cart_id', $generate)->where('product_id', $id)->exists()) {
            Cart::where('generate_cart_id', $generate)->where('product_id', $id)->increment('quantity');
        }
        else{
            $cart = new Cart;
            $cart->product_id = $id;
            $cart->generate_cart_id = $generate;
            $cart->save();
        }

        return back();
    }

    public function carts($code = '', Request $request)
    {
        if ($code == '') {
            $discount = 0;
            $old_cookie_id = Cookie::get('cart_id');
            $carts = Cart::where('generate_cart_id', $old_cookie_id)->get();
            return view('frontend.shopping.carts', compact('carts', 'discount'));
        }
        else{
            $coupon_code = Coupon::where('coupon_code', $code)->exists();

            if ($coupon_code) {
                $validity = Coupon::where('coupon_code', $code)->first()->validity;

                if (Carbon::now()->format('Y-m-d') <= $validity) {

                    $discount = Coupon::where('coupon_code', $code)->first()->discount;

                    $old_cookie_id = Cookie::get('cart_id');
                    $carts = Cart::where('generate_cart_id', $old_cookie_id)->get();
                    Cookie::queue('coupon_discount', $discount , 10080);
                    // session(['coupon' => $discount]);
                    return view('frontend.shopping.carts', compact('carts', 'discount'));
                }
                else{
                    $discount = 0;
                    $old_cookie_id = Cookie::get('cart_id');
                    $carts = Cart::where('generate_cart_id', $old_cookie_id)->get();
                    session(['coupon' => $discount]);
                    return view('frontend.shopping.carts', compact('carts', 'discount'));
                }
            }
            else{
                return "Not Found";
            }
        }
    }

    function SingleCartDelete($id)
    {
        Cart::findOrFail($id)->delete();
        return back();
    }


    public function cart_update(Request $request)
    {
        foreach ($request->cart_id as $key => $value) {
            Cart::findOrFail($value)->update([
                'quantity' => $request->quantity[$key],
                'updated_at' => Carbon::now()
            ]);
        }

        return back();
    }


    public function cart_post(Request $request)
    {
        $old_cookie_id = Cookie::get('cart_id');
        // return $cart_data = Cart::where('generate_cart_id', $old_cookie_id)->get();

        if ($old_cookie_id) {
            $generate = $old_cookie_id;
        }
        else{
            $generate = Str::upper('Cart').'_'.rand(1, 100000);
            Cookie::queue('cart_id', $generate , 10080);
        }

        if (Cart::where('generate_cart_id', $generate)->where('product_id', $request->product)->where('size_id', $request->size)->where('color_id', $request->color)->exists()) {
            Cart::where('generate_cart_id', $generate)->where('product_id', $request->product)->where('size_id', $request->size)->where('color_id', $request->color)->increment('quantity', $request->quantity);
        }
        else{
            $cart = new Cart;
            $cart->product_id = $request->product;
            $cart->generate_cart_id = $generate;
            $cart->size_id = $request->size;
            $cart->color_id = $request->color;
            $cart->save();

            return 'ok2';
        }

    }


    // public function coupon_code($code)
    // {
    //     if (Coupon::where('coupon_code', $code)->exists()) {
    //         return "Fount It";
    //     }
    //     else {
    //         return "Not Found";
    //     }
    // }
}
