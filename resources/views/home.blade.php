@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    @if(Session::get('popup'))
    <div class="popup-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    <div class="popup">
                        <span></span>
                        <div class="popup-text">
                            <h2>Join our newsletter and <br />get discount!</h2>
                            <p class="subscribe">Subscribe to the newsletter to receive updates about new products.</p>
                            <div class="form-popup">
                                <form action="{{URL::to('subscribes')}}" class="subscribe-form" method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <div class="subscribe-content">
                                        <input type="email" name="email" class="subscribe-email" placeholder="Your E-Mail" required>
                                        <button type="submit"><img src="{{asset('images/icons/right-2.png')}}" alt=""></button>
                                    </div>
                                </form><!-- /.subscribe-form -->
                                <div class="checkbox">
                                    <input type="checkbox" id="popup-not-show" name="category">
                                    <label for="popup-not-show">Don't show this popup again</label>
                                </div>
                            </div><!-- /.form-popup -->
                        </div><!-- /.popup-text -->
                        <div class="popup-image">
                            <img src="images/banner_boxes/popup.png" alt="">
                        </div><!-- /.popup-text -->
                    </div><!-- /.popup -->
                </div><!-- /.col-sm-8 -->
                <div class="col-sm-2">

                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.popup-newsletter -->
    @endif

    <section class="flat-row flat-slider style1">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="slider owl-carousel-11 style2">
                        @foreach($sliders as $slider)
                        <div class="slider-item style4">
                            <div class="item-text">
                                <div class="header-item">
                                    <p>Enhanced Technology</p>
                                    <h2 class="name">SMART <span>TV</span></h2>
                                    <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                </div>
                                <div class="content-item">
                                    <div class="price">
                                        <span class="sale">$2.456.90</span>
                                        <span class="btn-shop">
													<a href="{{ $slider->slider_link }}" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
												</span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="regular">
                                        $2.500.99
                                    </div>
                                </div>
                            </div>
                            <div class="item-image">
                                <img src="{{asset('storage/images/slider/'.$slider->image)}}" alt="">
                            </div>
                        </div><!-- /.slider-item style4 -->
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="banner-box">
                        <div class="inner-box">
                            <a href="#" title="">
                                <img src="images/banner_boxes/02.png" alt="">
                            </a>
                        </div><!-- /.inner-box -->
                        <div class="inner-box">
                            <a href="#" title="">
                                <img src="images/banner_boxes/01.png" alt="">
                            </a>
                        </div><!-- /.inner-box -->
                        <div class="clearfix"></div>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-slider -->

    <section class="flat-row flat-banner-box style1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="banner-box">
                        <div class="inner-box">
                            <a href="#" title="">
                                <img src="images/banner_boxes/03.png" alt="">
                            </a>
                        </div>
                    </div><!-- /.banner-box -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-9">
                    <div class="box-flex box-wrap">
                        <div class="flat-row-title">
                            <h3>Weekly Deal</h3>
                        </div>
                        <ul>
                            @foreach($weekly_deal as $product)
                            <li class="clone">
                                <div class="imagebox style5">
                                    <div class="box-text">
                                        <div class="box-content">
                                            <div class="cat-name">
                                                <a href="{{ url('productsByCat/'.$product->category_id) }}" title="">{{ $product->category->categoryName }}</a>
                                            </div>
                                            <div class="product-name">
                                                <a href="{{ url('products/'.$product->id) }}" title="">{{ substr($product->productName, 0, 23) }}</a>
                                            </div>
                                            <div class="price">
                                                <span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                <span class="regular">৳ {{ number_format($product->regularPrice) }}</span>
                                            </div>
                                        </div><!-- /.box-content -->
                                        <div class="box-bottom">
                                            <div class="btn-add-cart">
                                                <a @if ($product->product_url == null)class="addCart"@endif href="@if ($product->product_url){{ $product->product_url }}@else#@endif" title="" @if ($product->product_url)target="_blank"@endif data-url="{{ url('carts') }}" data-qty="1" data-id="{{ $product->id }}" style="font-size: 16px;">
                                                    <img src="{{asset('images/icons/add-cart.png')}}" alt="">Add to Cart
                                                </a>
                                            </div>
                                            <div class="compare-wishlist">@foreach($product->images as $image)@endforeach
                                                <a href="#" class="compare addCompare" title="Compare" data-id="{{$product->id}}" data-name="{{$product->productName}}" data-short_desc="{{$product->shortDescription}}" data-image="{{asset('storage/images/product/'.$image->image)}}" data-saleprice="{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}" data-stock="{{$product->availability}}" data-color="@foreach($product->colors as $color) {{$color->color}}, @endforeach" data-sizes="@foreach($product->sizes as $size) {{$size->size}}, @endforeach" data-tags="@foreach($product->tags as $tag) {{$tag->tag}}, @endforeach" data-url="{{url('products/'.$product->id)}}" data-product_url="{{ $product->product_url }}" data-requrl="{{url('productsByCat/'.$product->category_id)}}">
                                                    <img src="{{asset('images/icons/compare.png')}}" alt="">Compare
                                                </a>
                                                <a href="#" class="wishlist addWlist" title="Wishlist" data-id="{{$product->id}}" data-url="{{url('wishlists')}}">
                                                    <img src="{{asset('images/icons/wishlist.png')}}" alt="">Wishlist
                                                </a>
                                            </div>
                                        </div><!-- /.box-bottom -->
                                        <div class="count-down style1">
                                            <div class="count-down" data-countdown="{{$product->valid_until}}"></div>
                                        </div>
                                    </div><!-- /.box-text -->
                                    <div class="flexslider style2">
                                        <ul class="slides">
                                            @foreach($product->images as $image)
                                            <li data-thumb="{{asset('storage/images/product/'.$image->image)}}">
                                                <img src="{{asset('storage/images/product/'.$image->image)}}" alt="image flexslider" />
                                            </li>
                                            @endforeach
                                        </ul><!-- /.slides -->
                                    </div><!-- /.flexslider style2 -->
                                </div><!-- /.imagebox style5 -->
                            </li><!-- /.clone -->
                            @endforeach
                        </ul>
                    </div><!-- /.box-flex box-wrap -->
                </div><!-- /.col-md-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-banner-box -->

    <section class="flat-row flat-imagebox style1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Seasonal Discount</h3>
                        </div>
                        <div class="owl-carousel-12">
                            @php $i = 0; @endphp
                            @foreach($seasonal_discounts as $product)
                                @if($i == 0 || $i % 3 == 0)
                                    <div class="box-owl-carousel">
                                        <div class="rows">
                                            @endif
                                            @php $i ++; @endphp
                                            <div class="imagebox style1 v1">
                                                @foreach($product->images as $image) @endforeach
                                                <div class="box-image">
                                                    <a href="{{ url('products/'.$product->id) }}" title="">
                                                        <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                                    </a>
                                                </div><!-- /.box-image -->
                                                <div class="box-content">
                                                    <div class="cat-name">
                                                        <a href="{{ url('productsByCat/'.$product->category_id) }}" title="">{{ $product->category->categoryName }}</a>
                                                    </div>
                                                    <div class="product-name">
                                                        <a href="{{ url('products/'.$product->id) }}" title="">{{ $product->productName }}</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                        <span class="regular">৳ {{ number_format($product->regularPrice) }}</span>
                                                    </div>
                                                </div><!-- /.box-content -->
                                            </div><!-- /.imagbox style1 -->
                                            @if($i % 3 ==0)
                                                <div class="clearfix"></div>
                                        </div><!-- /.rows -->
                                    </div><!-- /.box-owl-carousel -->
                                @endif
                            @endforeach
                            <div class="clearfix"></div>
                        </div><!-- /.rows -->
                    </div><!-- /.box-owl-carousel -->
                </div><!-- /.owl-carousel-12 -->
            </div><!-- /.box-wrap -->
        </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style1 -->

    <section class="flat-row flat-imagebox style1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Regular Discount</h3>
                        </div>
                        <div class="owl-carousel-12">
                            @php $i = 0; @endphp
                            @foreach($regular_discounts as $product)
                                @if($i == 0 || $i % 3 == 0)
                            <div class="box-owl-carousel">
                                <div class="rows">
                                @endif
                                @php $i ++; @endphp
                                    <div class="imagebox style1 v1">
                                        @foreach($product->images as $image) @endforeach
                                        <div class="box-image">
                                            <a href="{{ url('products/'.$product->id) }}" title="">
                                                <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                            </a>
                                        </div><!-- /.box-image -->
                                        <div class="box-content">
                                            <div class="cat-name">
                                                <a href="{{ url('productsByCat/'.$product->category_id) }}" title="">{{ $product->category->categoryName }}</a>
                                            </div>
                                            <div class="product-name">
                                                <a href="{{ url('products/'.$product->id) }}" title="">{{ $product->productName }}</a>
                                            </div>
                                            <div class="price">
                                                <span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                <span class="regular">৳ {{ number_format($product->regularPrice) }}</span>
                                            </div>
                                        </div><!-- /.box-content -->
                                    </div><!-- /.imagbox style1 -->
                                    @if($i % 3 ==0)
                                    <div class="clearfix"></div>
                                </div><!-- /.rows -->
                            </div><!-- /.box-owl-carousel -->
                                @endif
                            @endforeach
                                    <div class="clearfix"></div>
                                </div><!-- /.rows -->
                            </div><!-- /.box-owl-carousel -->
                        </div><!-- /.owl-carousel-12 -->
                    </div><!-- /.box-wrap -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style1 -->

    <section class="flat-row flat-imagebox">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Closing Soon</h3>
                        </div>
                        <div class="owl-carousel-12">
                            @php $i = 0; @endphp
                            @foreach($ending_soon as $product)
                                @if($i == 0 || $i % 6 == 0)
                                <div class="box-owl-carousel style1">
                                @endif
                                @if($i == 0 || $i % 3 == 0)
                                    <div class="rows">
                                @endif
                                @php $i ++; @endphp
                                        <div class="imagebox style7">
                                            @foreach($product->images as $image) @endforeach
                                            <div class="box-image">
                                                <a href="{{ url('products/'.$product->id) }}" title="">
                                                    <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="{{ url('productsByCat/'.$product->category_id) }}" title="">{{ $product->category->categoryName }}</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="{{ url('products/'.$product->id) }}" title="">{{ $product->productName }}</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                    <span class="regular">৳ {{ number_format($product->regularPrice) }}</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                        </div><!-- /.imagbox style1 -->
                                @if($i % 3 == 0)
                                        <div class="clearfix"></div>
                                    </div><!-- /.rows -->
                                @endif
                                @if($i % 6 == 0)
                                </div><!-- /.box-owl-carousel style1 -->
                                @endif
                            @endforeach
                                    <div class="clearfix"></div>
                                </div><!-- /.rows -->
                            </div><!-- /.box-owl-carousel style1 -->
                        </div><!-- /.owl-carousel-12 -->
                    </div><!-- /.box-wrap -->
                </div><!-- /.col-md-9 -->
                <div class="col-md-3">
                    <div class="banner-box">
                        <div class="inner-box">
                            <a href="#" title="">
                                <img src="images/banner_boxes/03.png" alt="">
                            </a>
                        </div>
                        <div class="inner-box">
                            <a href="#" title="">
                                <img src="images/banner_boxes/04.jpg" alt="">
                            </a>
                        </div>
                    </div><!-- /.banner-box -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style1 -->

    <section class="flat-row flat-imagebox style4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Best Deals</h3>
                        </div><!-- /.flat-row-title -->
                        <div class="box-owl-carousel margin-box">
                            <div class="owl-carousel-13">
                                @foreach($best_deals as $product)
                                <div class="imagebox style4 v1">
                                    <div class="view">
                                    </div>
                                    @foreach($product->images as $image) @endforeach
                                    <div class="box-image">
                                        <a href="{{ url('products/'.$product->id) }}" title="">
                                            <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                        </a>
                                    </div><!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="{{ url('productsByCat/'.$product->category_id) }}" title="">{{ $product->category->categoryName }}</a>
                                        </div>
                                        <div class="product-name">
                                            <a href="{{ url('products/'.$product->id) }}" title="">{{ $product->productName }}</a>
                                        </div>
                                        <div class="price">
                                            <span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                            <span class="regular">৳ {{ number_format($product->regularPrice) }}</span>
                                        </div>
                                    </div><!-- /.box-content -->
                                </div><!-- /.imagebox style4 v1 -->
                                @endforeach
                            </div><!-- /.owl-carousel-3 -->
                        </div><!-- /.owl-carousel-2 -->
                    </div><!-- /.box-wrap -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style4 -->

    <section class="flat-row flat-iconbox">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="images/icons/car.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Worldwide Shipping</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="images/icons/order.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Order Online Service</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="images/icons/payment.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Payment</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="images/icons/return.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Return 30 Days</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-iconbox -->

    <section class="flat-imagebox style2 background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-wrap">
                        <div class="product-tab style1">
                            <ul class="tab-list">
                                <li class="active">Smartphones</li>
                                <li>Tablets</li>
                                <li>Game Box</li>
                                <li>Accessories</li>
                                <li>Mobiles</li>
                                <li>Computers</li>
                            </ul><!-- /.tab-list -->
                        </div><!-- /.product-tab style1 -->
                        <div class="tab-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-box">
                                        <div class="imagebox style2 v1">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">HeadPhones</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Beats Solo<br />HD</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,999.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box style2">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l02.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box style2">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Cameras</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">HTC One M8</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$2,009.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box style2">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l03.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box style2">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l05.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Computers</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple macbook pro Z0SC4824<br />Retina</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$5,759.68</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l03.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l05.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Headphones</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Beats Solo<br />HD</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,999.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l02.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l05.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l03.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l02.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Headphones</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Beats Solo<br />HD</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,999.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Headphones</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Beats Solo<br />HD</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,999.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l03.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l02.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l05.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l03.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Headphones</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Beats Solo<br />HD</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,999.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l02.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l05.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l05.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l03.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l02.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-3 col-sm-6 -->
                                <div class="col-md-6">
                                    <div class="product-box">
                                        <div class="imagebox style2">
                                            <div class="box-image">
                                                <a href="#" title="">
                                                    <img src="images/product/other/l01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Headphones</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Beats Solo<br />HD</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,999.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style2 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.tab-item -->
                    </div><!-- /.product-wrap -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style2 -->

    <section class="flat-imagebox style3" id="deal">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel-2">
                        @foreach ($regular_discounts as $product)
                            <div class="box-counter">
                                <div class="counter">
                                    <span class="special">Special Offer</span>
                                    <div class="counter-content">
                                        <p>{{ strip_tags($product->shortDescription) }}</p>
                                        <div class="count-down" data-countdown="{{$product->valid_until}}">
                                            <div class="square">
                                                <div class="numb">
                                                    7
                                                </div>
                                                <div class="text">
                                                    DAYS
                                                </div>
                                            </div>
                                            <div class="square">
                                                <div class="numb">
                                                    4
                                                </div>
                                                <div class="text">
                                                    HOURS
                                                </div>
                                            </div>
                                            <div class="square">
                                                <div class="numb">
                                                    25
                                                </div>
                                                <div class="text">
                                                    MINS
                                                </div>
                                            </div>
                                            <div class="square">
                                                <div class="numb">
                                                    30
                                                </div>
                                                <div class="text">
                                                    SECS
                                                </div>
                                            </div>
                                        </div><!-- /.count-down -->
                                    </div><!-- /.counter-content -->
                                </div><!-- /.counter -->
                                <div class="product-item">
                                    <div class="imagebox style3">
                                        <div class="box-image save">
                                            @foreach ($product->images as $image) @endforeach
                                            <a href="{{URL::to('/products/'.$product->id)}}" title="">
                                                <img src="{{asset('storage/images/product/'.$image->image)}}" alt="" style="height:400px; width:350px">
                                            </a>
                                            <span>Save ৳ {{ number_format($product->regularPrice-($product->salePrice * $product->discount_value/100)) }}</span>
                                        </div><!-- /.box-image -->
                                        <div class="box-content">
                                            <div class="product-name">
                                                <a href="{{URL::to('/products/'.$product->id)}}" title="">{{$product->productName}}</a>
                                            </div>
                                            <ul class="product-info">
                                                <li>{{ strip_tags($product->shortDescription) }}</li>
                                            </ul>
                                            <div class="price">
                                                <span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                <span class="regular">৳ {{ number_format($product->regularPrice) }}</span>
                                            </div>
                                        </div><!-- /.box-content -->
                                        <div class="box-bottom">
                                            <div class="btn-add-cart">
                                                <a @if ($product->product_url == null)class="addCart"@endif href="@if ($product->product_url){{ $product->product_url }}@else#@endif" title="" @if ($product->product_url)target="_blank"@endif data-url="{{ url('carts') }}" data-qty="1" data-id="{{ $product->id }}">
                                                    <img src="{{asset('images/icons/add-cart.png')}}" alt="">Add to Cart
                                                </a>
                                            </div>
                                            <div class="compare-wishlist">
                                                <a href="#" class="compare addCompare" title="Compare" data-id="{{$product->id}}" data-name="{{$product->productName}}" data-short_desc="{{$product->shortDescription}}" data-image="{{asset('storage/images/product/'.$image->image)}}" data-saleprice="{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}" data-stock="{{$product->availability}}" data-color="@foreach($product->colors as $color) {{$color->color}}, @endforeach" data-sizes="@foreach($product->sizes as $size) {{$size->size}}, @endforeach" data-tags="@foreach($product->tags as $tag) {{$tag->tag}}, @endforeach" data-url="{{url('products/'.$product->id)}}" data-product_url="{{ $product->product_url }}" data-requrl="{{url('productsByCat/'.$product->category_id)}}">
                                                    <img src="{{asset('images/icons/compare.png')}}" alt="">Compare
                                                </a>
                                                <a href="#" class="wishlist addWlist" title="Wishlist" data-id="{{$product->id}}" data-url="{{url('wishlists')}}">
                                                    <img src="{{asset('images/icons/wishlist.png')}}" alt="">Wishlist
                                                </a>
                                            </div>
                                        </div><!-- /.box-bottom -->
                                    </div><!-- /.imagbox style3 -->
                                </div><!-- /.product-item -->
                            </div><!-- /.box-counter -->
                        @endforeach
                    </div><!-- /.owl-carousel-2 -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-imagebox style3 -->

    <section class="flat-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box-wrap style1">
                        <div class="flat-row-title">
                            <h3>Top Country Offers</h3>
                        </div><!-- /.flat-row-title -->
                        <ul class="product-list style1">
                            @php $j = 0; @endphp
                            @foreach ($regular_discounts as $product)
                                @php $j++; @endphp
                                <li>
                                    <div class="img-product">
                                        @foreach ($product->images as $image) @endforeach
                                        <a href="{{URL::to('products/'.$product->id)}}" title="">
                                            <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="info-product">
                                        <div class="name">
                                            <a href="{{URL::to('products/'.$product->id)}}" title="">{{$product->productName}}</a>
                                            <div class="pull-right">
                                                <span class="menu-img"><img src="{{asset('storage/images/country/flag/'.$product->country->flag)}}" style="height: 30px;width: 30px;border-radius: 50%"  alt=""></span>
                                            </div>
                                        </div>
                                        @php $sum = $i = 0; @endphp
                                        @foreach($product->productreviews as $productcomment)
                                            @php
                                                $i++;
                                                $sum += $productcomment->productReview;
                                            @endphp
                                        @endforeach
                                        @if($sum)
                                            @php $score = round($sum/$i); @endphp
                                            @if($score == 5)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @elseif($score == 4)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @elseif($score == 3)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @elseif($score == 2)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @else
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                        @else
                                            <div style="color:red">
                                                No review yet
                                            </div>
                                        @endif
                                        <div class="price">
                                            <span class="sale">৳{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                            <span class="regular">৳{{ number_format($product->regularPrice) }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                @if($j == 3)
                                    @php break; @endphp
                                @endif
                            @endforeach
                        </ul><!-- /.product-list style1 -->
                    </div>
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="box-wrap style1">
                        <div class="flat-row-title">
                            <h3>Top Brand Offers</h3>
                        </div><!-- /.flat-row-title -->
                        <ul class="product-list style1">
                            @php $j = 0; @endphp
                            @foreach ($regular_discounts as $product)
                                @php $j++; @endphp
                                @if($j > 3)
                                <li>
                                    <div class="img-product">
                                        @foreach ($product->images as $image) @endforeach
                                        <a href="{{URL::to('products/'.$product->id)}}" title="">
                                            <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="info-product">
                                        <div class="name">
                                            <a href="{{URL::to('products/'.$product->id)}}" title="">{{$product->productName}}</a>
                                            <div class="pull-right">
                                                <span class="menu-img"><img src="{{asset('storage/images/brands/'.$product->brand->brandLogo)}}" style="height: 30px;width: 30px;border-radius: 50%"  alt=""></span>
                                            </div>
                                        </div>

                                        @php $sum = $i = 0; @endphp
                                        @foreach($product->productreviews as $productcomment)
                                            @php
                                                $i++;
                                                $sum += $productcomment->productReview;
                                            @endphp
                                        @endforeach
                                        @if($sum)
                                            @php $score = round($sum/$i); @endphp
                                            @if($score == 5)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @elseif($score == 4)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @elseif($score == 3)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @elseif($score == 2)
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @else
                                                <div class="queue">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                        @else
                                            <div style="color:red">
                                                No review yet
                                            </div>
                                        @endif

                                        <div class="price">
                                            <span class="sale">৳{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                            <span class="regular">৳{{ number_format($product->regularPrice) }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                @endif
                                @if($j == 6)
                                    @php break; @endphp
                                @endif
                            @endforeach
                        </ul><!-- /.product-list style1 -->
                    </div>
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="box-wrap style1">
                        <div class="flat-row-title">
                            <h3>Top Product Offers</h3>
                        </div><!-- /.flat-row-title -->
                        <ul class="product-list style1">
                            @php $j = 0; @endphp
                            @foreach ($regular_discounts as $product)
                                @php $j++; @endphp
                                @if($j > 6)
                                    <li>
                                        <div class="img-product">
                                            @foreach ($product->images as $image) @endforeach
                                            <a href="{{URL::to('products/'.$product->id)}}" title="">
                                                <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <div class="name">
                                                <a href="{{URL::to('products/'.$product->id)}}" title="">{{$product->productName}}</a>
                                            </div>
                                            @php $sum = $i = 0; @endphp
                                            @foreach($product->productreviews as $productcomment)
                                                @php
                                                    $i++;
                                                    $sum += $productcomment->productReview;
                                                @endphp
                                            @endforeach
                                            @if($sum)
                                                @php $score = round($sum/$i); @endphp
                                                @if($score == 5)
                                                    <div class="queue">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                @elseif($score == 4)
                                                    <div class="queue">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                @elseif($score == 3)
                                                    <div class="queue">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                @elseif($score == 2)
                                                    <div class="queue">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                @else
                                                    <div class="queue">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                @endif
                                            @else
                                                <div style="color:red">
                                                    No review yet
                                                </div>
                                            @endif
                                            <div class="price">
                                                <span class="sale">৳{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                <span class="regular">৳{{ number_format($product->regularPrice) }}</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                @endif
                                @if($j == 9)
                                    @php break; @endphp
                                @endif
                            @endforeach
                        </ul><!-- /.product-list style1 -->
                    </div>
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-highlights -->

    <section class="flat-row flat-brand style2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="owl-carousel-9">
                        @foreach ($partners as $partner)
                            <li>
                                <img src="{{asset('storage/images/brands/'.$partner->brandLogo)}}" alt="">
                            </li>
                        @endforeach
                    </ul><!-- /.owl-carousel-5 -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-brand -->
@endsection
