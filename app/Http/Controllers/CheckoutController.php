<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PDF;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function checkout(Request $request)
    {
        // $data['client_name']='Jhon';
        // $data['subject']='Hello!';

        // $pdf = PDF::loadView('welcome', $data);
        // Mail::send('welcome', $data, function($message) use ($data,$pdf) {
        //     $message->from('sender@domain.net');
        //     $message->to('laravel.trial.smtp@gmail.com', $data['client_name'])
        //     ->subject($data['subject'])
        //     ->attachData($pdf->output(), 'invoice.pdf');
        // });

        // $value = $request->session()->get('coupon');
        $old_cookie_id = Cookie::get('cart_id');
        $carts = Cart::where('generate_cart_id', $old_cookie_id)->get();

        $discount_cookie = Cookie::get('coupon_discount');
        return view('frontend.checkout', compact('discount_cookie', 'carts'));
    }
}
