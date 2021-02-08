@extends('frontend.master')

@section('title')
Product Details
@endsection

@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shop Page</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- single-product-area start-->
<div class="single-product-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-single-img">
                    <div class="product-active owl-carousel">
                        <div class="item">
                            <img src="{{ asset('products/thumbnail/'. $products->thumbnail) }}" alt="">
                        </div>
                        @foreach ($products->product_images as $images)
                        <div class="item">
                            <img src="{{ asset('products/images/'. $images->product_id .'/'. $images->images) }}"
                                alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="product-thumbnil-active  owl-carousel">
                        <div class="item">
                            <img src="{{ asset('products/thumbnail/'. $products->thumbnail) }}" alt="">
                        </div>
                        @foreach ($products->product_images as $images)
                        <div class="item">
                            <img src="{{ asset('products/images/'. $images->product_id .'/'. $images->images) }}"
                                alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-single-content">
                    <h3>{{ $products->id }}. {{ $products->title }}</h3>
                    <div class="rating-wrap fix">
                        <span class="pull-left">{{ $products->price }}</span>
                        <ul class="rating pull-right">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li>(05 Customar Review)</li>
                        </ul>
                    </div>
                    <form action="{{route('CartPost')}}" method="POST">
                        @csrf
                        <p>{{$products->summary }}</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="number" min="1" name="quantity" />
                            </li>
                            <li><button type="submit"
                                    style="height: 35px; line-height: 35px; text-align: center; width: 120px; background: #ef4836; color: #fff; display: block; margin-left: 30px;"
                                    href="#">Add to Cart</button></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <input type="hidden" name="product" value="{{$products->id}}">
                            <li><a href="#">{{ $products->get_category->category_name }}</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Colors:</li>
                            <li>
                                @foreach ($grouped as $key => $attributes)
                                <input class="colorid" type="radio" data-name="{{ $attributes[0]->product_id }}"
                                    name="color" value="{{$attributes[0]->color_id}}">
                                {{$attributes[0]->get_color->color_name}}
                                @endforeach

                                {{-- @foreach ($products->products_attributes as $attributes)
                                    <input name="color" type="radio" value="{{ $attributes->get_color->id }}">
                                {{ $attributes->get_color->color_name }}
                                @endforeach --}}
                            </li>
                        </ul>
                        <ul class="cetagory">
                            <li>Available Size:</li>
                            <li class="sizeadd">
                                @foreach ($products->products_attributes as $attributes)
                                <input name="size" type="radio" value="{{ $attributes->get_size->id }}">
                                {{ $attributes->get_size->size }}
                                @endforeach
                            </li>
                        </ul>
                    </form>
                    <ul class="socil-icon">
                        <li>Share :</li>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('ProductsDetails', $products->slug) }}"
                                target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-12">
                <div class="single-product-menu">
                    <ul class="nav">
                        <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                        <li><a data-toggle="tab" href="#tag">Faq</a></li>
                        <li><a data-toggle="tab" href="#review">Review</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <div class="description-wrap">
                            <p>{!! nl2br($products->description) !!}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="tag">
                        <div class="faq-wrap" id="accordion">

                            @foreach ($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="heading{{$faq->id}}">
                                    <h5><button class="collapsed" data-toggle="collapse"
                                            data-target="#collapse{{$faq->id}}" aria-expanded="false"
                                            aria-controls="collapse{{$faq->id}}">{{ $faq->question }} ?</button></h5>
                                </div>
                                <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $faq->answear }}
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane" id="review">
                        <div class="review-wrap">
                            <ul>
                                <li class="review-items">
                                    <div class="review-img">
                                        <img src="{{ asset('front/images/comment/1.png') }}" alt="">
                                    </div>
                                    <div class="review-content">
                                        <h3><a href="#">GERALD BARNES</a></h3>
                                        <span>27 Jun, 2019 at 2:30pm</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                            egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget
                                            eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="review-items">
                                    <div class="review-img">
                                        <img src="{{ asset('front/images/comment/2.png') }}" alt="">
                                    </div>
                                    <div class="review-content">
                                        <h3><a href="#">Olive Oil</a></h3>
                                        <span>15 may, 2019 at 2:30pm</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                            egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget
                                            eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="review-items">
                                    <div class="review-img">
                                        <img src="{{ asset('front/images/comment/3.png') }}" alt="">
                                    </div>
                                    <div class="review-content">
                                        <h3><a href="#">Nature Honey</a></h3>
                                        <span>14 janu, 2019 at 2:30pm</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                            egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget
                                            eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="add-review">
                            <h4>Add A Review</h4>
                            <div class="ratting-wrap">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>task</th>
                                            <th>1 Star</th>
                                            <th>2 Star</th>
                                            <th>3 Star</th>
                                            <th>4 Star</th>
                                            <th>5 Star</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>How Many Stars?</td>
                                            <td>
                                                <input type="radio" name="a" />
                                            </td>
                                            <td>
                                                <input type="radio" name="a" />
                                            </td>
                                            <td>
                                                <input type="radio" name="a" />
                                            </td>
                                            <td>
                                                <input type="radio" name="a" />
                                            </td>
                                            <td>
                                                <input type="radio" name="a" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h4>Name:</h4>
                                    <input type="text" placeholder="Your name here..." />
                                </div>
                                <div class="col-md-6 col-12">
                                    <h4>Email:</h4>
                                    <input type="email" placeholder="Your Email here..." />
                                </div>
                                <div class="col-12">
                                    <h4>Your Review:</h4>
                                    <textarea name="massage" id="massage" cols="30" rows="10"
                                        placeholder="Your review here..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn-style">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single-product-area end-->
<!-- featured-product-area start -->
<div class="featured-product-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-left">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="{{ asset('front/images/product/1.jpg') }}" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Nature Honey</a></h3>
                                <p>$219.56</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="{{ asset('front/images/product/2.jpg') }}" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Olive Oil</a></h3>
                                <p>$354.75</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="{{ asset('front/images/product/3.jpg') }}" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Sunrise Oil</a></h3>
                                <p>$214.80</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="featured-product-wrap">
                    <div class="featured-product-img">
                        <img src="{{ asset('front/images/product/4.jpg') }}" alt="">
                    </div>
                    <div class="featured-product-content">
                        <div class="row">
                            <div class="col-7">
                                <h3><a href="shop.html">Coconut Oil</a></h3>
                                <p>$241.00</p>
                            </div>
                            <div class="col-5 text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured-product-area end -->
@endsection

@section('footer_js')
<script>
    $('.colorid').change(function () {
        let colorid = $(this).val();
        let product_id = $(this).attr("data-name");

        if (colorid) {
            $.ajax({
                type: "GET",
                url: "{{ url('product/get/size/')}}/" + colorid + '/' + product_id,
                success: function (res) {
                    $(".sizeadd").html(res);
                }
            })
        }
    })

</script>
@endsection
