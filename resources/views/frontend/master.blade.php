<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Tohoney')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front/images/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('front/css/flaticon.css') }}">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.css') }}">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('front/css/metisMenu.min.css') }}">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('front/css/swiper.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('front/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> {{ $details->phone ?? '' }}</li>
                            <li><i class="fa fa-envelope"></i> {{ $details->email ?? '' }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    @else
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endguest
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                        <img src="{{ ('front/images/logo.png') }}" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="@yield('home')"><a href="{{ route('front') }}">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="@yield('shop')">
                                    <a href="{{ route('Shop') }}">Shop</a>
                                </li>
                                <li class="@yield('carts')">
                                    <a href="{{ route('Carts') }}"><i class="fa fa-shopping-bag"></i> Carts</a>
                                </li>
                                <li class="@yield('blogs')">
                                    <a href="{{ route('AllArticle') }}"><i class="fa fa-blog"></i> Blogs</a>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>2</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ ('front/images/cart/1.jpg') }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ ('front/images/cart/3.jpg') }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                </ul>
                            </li>
                            @php
                                $subtotal = 0;
                            @endphp
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ TotalCarts()->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @forelse (TotalCarts() as $cart_item)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ ('front/images/cart/1.jpg') }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="#">{{ $cart_item->products->title }}</a>
                                            <span>QTY : {{ $cart_item->quantity }}</span>
                                            <p>${{ $cart_item->products->price }}</p>
                                            <a href="{{ route('SingleCartDelete', $cart_item->id) }}"><i class="fa fa-times"></i></a>
                                            @php
                                                $subtotal += $cart_item->quantity * $cart_item->products->price;
                                            @endphp
                                        </div>
                                    </li>
                                    @empty

                                    @endforelse
                                    <li>Subtotal: <span class="pull-right">${{ $subtotal }}</span></li>
                                    <li>
                                        <a class="btn btn-info" href="{{ route('CheckOut') }}">Check Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="single-product.html">Product Details</a></li>
                                      <li><a href="cart.html">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->

    @yield('content')

    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>{{ $details->about ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> {{ $details->email ?? '' }}</a></li>
                                <li><a href="#"><span>Tel:</span> {{ $details->phone ?? '' }}</a></li>
                                <li><a href="#"><span>Adress:</span> {{ $details->address ?? '' }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © {{ date('Y') }} Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('front/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('front/js/scrollup.js') }}"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('front/js/jquery.zoom.min.js') }}"></script>
    <!-- countdown.js -->
    <script src="{{ asset('front/js/countdown.js') }}"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('front/js/swiper.min.js') }}"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('front/js/metisMenu.min.js') }}"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('front/js/mailchimp.js') }}"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('front/js/scripts.js') }}"></script>
    <!-- footer js -->
    @yield('footer_js')
</body>

</html>
