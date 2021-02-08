@extends('frontend.master')

@section('title')
    Shopping Carts | Tohoney
@endsection

@section('carts')
    active
@endsection

@section('content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('CartUpdate') }}" method="POST">
                        @csrf
                        <table class="table table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="ptice">Color</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @forelse ($carts as $c_cart)
                                <tr>
                                    <input type="hidden" value="{{ $c_cart->id }}" name="cart_id[]">
                                    <td class="images"><img src="{{ asset('products/thumbnail/'. $c_cart->products->thumbnail) }}" alt=""></td>
                                    <td class="product"><a href="{{ route('ProductsDetails', $c_cart->products->slug) }}">{{ $c_cart->products->title }}</a></td>
                                    <td class="ptice unit_price{{ $c_cart->id }}" data-unit{{ $c_cart->id }}="{{ $c_cart->products->price }}">${{ $c_cart->products->price }}</td>
                                    <td class="ptice unit_price">Color:Size</td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" min="1" name="quantity[]" class="cart_quantity{{ $c_cart->id }}" id="cart_quantity" value="{{ $c_cart->quantity }}" />
                                        <div class="dec qtybutton qtyminus{{ $c_cart->id }}">-</div><div class="inc qtybutton qtyplus{{$c_cart->id}}">+</div>
                                    </td>
                                    <td class="total_Unit{{ $c_cart->id }}">$ {{ $c_cart->quantity * $c_cart->products->price }}

                                        @php $total += $c_cart->quantity * $c_cart->products->price; @endphp

                                    </td>
                                    <td class="remove"><a href="{{ route('SingleCartDelete', $c_cart->id) }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">No Carts Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button>Update Cart</button>
                                        </li>
                                        <li><a href="{{ route('Shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <p class="text-danger">{{session('message')}}</p>
                                    <div class="cupon-wrap">
                                        <input type="text" value="" class="coupon_code" placeholder="Cupon Code">
                                        <button type="button" class="coupon_button">Apply Cupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>{{ $total }}</li>
                                        <li><span class="pull-left">Discount </span>{{$discount}}%</li>
                                        <li><span class="pull-left"> Total </span>{{ $total - ($total * $discount / 100) }}</li>
                                    </ul>
                                    <a href="{{ route('CheckOut') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection

@section('footer_js')
    <script>
        $(document).ready(function(){
            @foreach($carts as $c)
            $('.qtyplus{{ $c->id }}').click(function(){
                let cart_quantity = $('.cart_quantity{{ $c->id }}').val();
                let unit_price = $('.unit_price{{ $c->id }}').attr('data-unit{{ $c->id }}');
                let Qty = parseFloat(cart_quantity) + 1;
                let newQty = $('.cart_quantity{{ $c->id }}').val(Qty);
                $('.total_Unit{{ $c->id }}').html('$' + $('.cart_quantity{{ $c->id }}').val() * unit_price);
            });

            $('.qtyminus{{ $c->id }}').click(function(){
                let cart_quantity = $('.cart_quantity{{ $c->id }}').val();
                if (cart_quantity != 1) {
                    let unit_price = $('.unit_price{{ $c->id }}').attr('data-unit{{ $c->id }}');
                    let Qty = parseFloat(cart_quantity) - 1;
                    let newQty = $('.cart_quantity{{ $c->id }}').val(Qty);
                    $('.total_Unit{{ $c->id }}').html('$' + $('.cart_quantity{{ $c->id }}').val() * unit_price);
                }
            });
            @endforeach
        })
    </script>

    <script>
        $('.coupon_button').click(function(){
            let coupon = $('.coupon_code').val();
            window.location.href = "{{ url('cart') }}" +"/"+ coupon;
        })
    </script>
@endsection
