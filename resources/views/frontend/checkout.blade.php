@extends('frontend.master')

@section('title')
Checkout | Tohoney
@endsection

@section('checkout')
active
@endsection

@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<style>
    .color_red {
        color: red;
    }

    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    #card-element {
        width: 100%;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

</style>
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{ route('Payment') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>First Name <span class="color_red">*</span></p>
                                <input name="first_name" type="text">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Last Name <span class="color_red">*</span></p>
                                <input name="last_name" type="text">
                            </div>
                            <div class="col-12">
                                <p>Company Name</p>
                                <input name="company_name" type="text">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address </span></p>
                                <input name="email" type="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. <span class="color_red">*</span></p>
                                <input name="phone" type="text">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Country <span class="color_red">*</span></p>
                                <select name="country_id" id="s_country">
                                    <option value="1">Select a country</option>
                                    <option value="2">bangladesh</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">Afghanistan</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">Albania</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">Dominican Republic</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>City <span class="color_red">*</span></p>
                                <select name="city_id" id="s_country">
                                    <option value="1">Select a country</option>
                                    <option value="2">bangladesh</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">Afghanistan</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">Albania</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">Dominican Republic</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP <span class="color_red">*</span></p>
                                <input name="zipcode" type="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Your Address <span class="color_red">*</span></p>
                                <input name="address" type="text">
                            </div>
                            <div class="col-12">
                                <input id="toggle1" type="checkbox">
                                <label for="toggle1">Pure CSS Accordion</label>
                                <div class="create-account">
                                    <p>Create an account by entering the information below. If you are a returning
                                        customer please login at the top of the page.</p>
                                    <span>Account password</span>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <input id="toggle2" type="checkbox">
                                <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                <div class="row" id="open2">
                                    <div class="col-12">
                                        <p>Country</p>
                                        <select id="s_country">
                                            <option value="1">Select a country</option>
                                            <option value="2">bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div>
                                    <div class=" col-12">
                                        <p>First Name</p>
                                        <input id="s_f_name" type="text" />
                                    </div>
                                    <div class=" col-12">
                                        <p>Last Name</p>
                                        <input id="s_l_name" type="text" />
                                    </div>
                                    <div class="col-12">
                                        <p>Company Name</p>
                                        <input id="s_c_name" type="text" />
                                    </div>
                                    <div class="col-12">
                                        <p>Address</p>
                                        <input type="text" placeholder="Street address" />
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                    </div>
                                    <div class="col-12">
                                        <p>Town / City </p>
                                        <input id="s_city" type="text" placeholder="Town / City" />
                                    </div>
                                    <div class="col-12">
                                        <p>State / County </p>
                                        <input id="s_county" type="text" />
                                    </div>
                                    <div class="col-12">
                                        <p>Postcode / Zip </p>
                                        <input id="s_zip" type="text" placeholder="Postcode / Zip" />
                                    </div>
                                    <div class="col-12">
                                        <p>Email Address </p>
                                        <input id="s_email" type="email" />
                                    </div>
                                    <div class="col-12">
                                        <p>Phone </p>
                                        <input id="s_phone" type="text" placeholder="Phone Number" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="massage"
                                    placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        @php
                        $sTotal = 0;
                        @endphp
                        @foreach ($carts as $cart)
                        <li>{{$cart->products->title}} <span class="pull-right">{{$cart->quantity}} x
                                ${{$cart->products->price}}</span></li>
                        @php
                        $sTotal += $cart->products->price * $cart->quantity
                        @endphp
                        @endforeach

                        <li>Sub Total <span class="pull-right"><strong>${{$sTotal}}</strong></span></li>

                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Discount ({{$discount_cookie}}%) <span
                                class="pull-right">${{ ($sTotal * $discount_cookie / 100) }}</span></li>
                        <li> Total<span class="pull-right">${{ $sTotal - ($sTotal * $discount_cookie / 100) }}</span>
                        </li>
                    </ul>
                    <ul class="payment-method">
                        <li>
                            <input id="bank" type="radio" name="pMethod" value="bank">
                            <label for="bank">Direct Bank Transfer</label>
                        </li>
                        <li>
                            <input id="paypal" type="radio" name="pMethod" value="paypal">
                            <label for="paypal">Paypal</label>
                        </li>
                        <li>
                            <input id="card" type="radio" name="pMethod" value="card">
                            <label for="card">Credit Card</label>
                        </li>
                        <li>
                            <input id="delivery" type="radio" name="pMethod" value="cash">
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                    </ul>

                    <div id="cardpayment">
                        <div class="form-row">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>

                    <button id="PlaceOrder" type="submit">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection

@section('footer_js')
<script src="//js.stripe.com/v3/"></script>
<script>
    $(document).ready(function () {
        $('#PlaceOrder').hide();
        $('#cardpayment').hide();
        $($('#paypal').click(function () {
            $('#cardpayment').hide();
            $('#PlaceOrder').show();
        }))
        $($('#card').click(function () {
            $('#cardpayment').show();
            $('#PlaceOrder').show();

            // Create a Stripe client.
            var stripe = Stripe(
                'pk_test_51HiiOSBdjqa7810PWHWnQfM00fXCURqlZTaJuaGyaP514ydFG4tBP5lCMnNIyH9ldCQhgXRcO24yHFFwqcGjRM0r00R6ojGlbP'
            );

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

        }))
    })
</script>
@endsection
