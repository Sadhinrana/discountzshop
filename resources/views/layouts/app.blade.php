<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<!-- Mirrored from grandetest.com/theme/techno-html/index-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Apr 2019 05:28:05 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Discountzshop - @yield('title')</title>

    <meta name="author" content="CreativeLayers">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="{{url()->current()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content=" Discountzshop - Focusing on Technology Solution" />
    <meta property="og:description"   content="TechFocus was founded, and continues to flourish based on a very unique culture. We cater to every client and their demanding requirements. We earn our customers trust and loyalty. We listen intently and respond to their needs with solutions that really work. Our services combine our technology expertise backed with a commitment of personable service and dependable support. We're driven to remain 'ahead of the curve' because technology evolves rapidly. This presents the opportunity for small and mid-sized businesses to dramatically improve the efficiency of their enterprise." />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />

    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">

    <link rel="shortcut icon" href="{{asset('favicon/favicon.png')}}">

    <script>
        <!-- App base_url-->
        var base_url = {!! json_encode(url('/')) !!}
    </script>

</head>
<body class="header_sticky">
<div class="boxed style1">

    <div class="overlay"></div>

    <!-- Preloader -->
    <div class="preloader">
        <div class="clear-loading loading-effect-2">
            <span></span>
        </div>
    </div><!-- /.preloader -->

    <section id="header" class="header">
        <div class="header-top style3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="flat-support">
                            <li>
                                <a href="{{ url('bid') }}" title="">Bid</a>
                            </li>
                            <li>
                                <a href="{{ url('auction') }}" title="">Auction</a>
                            </li>
                            <li>
                                <a href="{{ url('offers/6') }}" title="">Deals</a>
                            </li>
                        </ul><!-- /.flat-support -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <ul class="flat-infomation">
                            <li class="phone">
                                Call Us: <a href="#" title=""> +88 01714243446 </a>
                            </li>
                        </ul>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <ul class="flat-unstyled">
                            <li class="account">
                                <a href="{{url('dashboard')}}" title="">My Account<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="unstyled">
                                    @guest
                                        <li>
                                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                    <li>
                                        <a href="{{url('wishlists')}}" title="">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="{{url('carts')}}" title="">My Cart</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" title="">USD<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="unstyled">
                                    <li>
                                        <a href="#" title="">Euro</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">Dolar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" title="">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="unstyled">
                                    <li>
                                        <a href="#" title="">Turkish</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">English</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">اللغة العربية</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">Español</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">Italiano</a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- /.flat-unstyled -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.header-top -->
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="logo" class="logo">
                            <a href="{{url('/')}}" title="">
                                <img src="{{asset('images/logos/logo.png')}}" alt="">
                            </a>
                        </div><!-- /#logo -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-6">
                        <div class="top-search">
                            <form action="{{url('searchedProduct')}}" method="get" class="form-search" accept-charset="utf-8">
                                <div class="cat-wrap">
                                    @php
                                        $categories = \App\Model\Product\Category::where('parent_id', 0)->orderBy('id', 'desc')->get();
                                        $brands = \App\Model\Product\Brand::all();
                                        $countries = \App\Model\Product\Country::all();
                                        $carts = \Illuminate\Support\Facades\Session::get('cart');
                                    @endphp
                                    <select name="category">
                                        <option hidden value="">All Category</option>
                                        <option hidden value="">Cameras</option>
                                        <option hidden value="">Computer</option>
                                        <option hidden value="">Laptops</option>
                                    </select>
                                    <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    <div class="all-categories">
                                        @foreach($categories as $category)
                                        <div class="cat-list-search">
                                            <div class="title">
                                                {{$category->categoryName}}
                                            </div>
                                            @if(count($category->childs))
                                                @include('product.manageCatChild',['childs' => $category->childs])
                                            @endif
                                        </div><!-- /.cat-list-search -->
                                        @endforeach
                                    </div><!-- /.all-categories -->
                                </div><!-- /.cat-wrap -->
                                <div class="box-search">
                                    <input type="text" name="search" placeholder="Search what you looking for ?" required>
                                    <span class="btn-search">
											<button type="submit" class="waves-effect"><img src="{{asset('images/icons/search.png')}}" alt=""></button>
										</span>
                                    <div class="search-suggestions">
                                        <div class="box-suggestions">
                                            <div class="title">
                                                Search Suggestions
                                            </div>
                                            <ul id="productSug">

                                            </ul>
                                        </div><!-- /.box-suggestions -->
                                    </div><!-- /.search-suggestions -->
                                </div><!-- /.box-search -->
                            </form><!-- /.form-search -->
                        </div><!-- /.top-search -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-3">
                        <div class="box-cart">
                            <div class="inner-box">
                                <ul class="menu-compare-wishlist">
                                    <li class="compare">
                                        <a href="#" title="">
                                            <img src="{{asset('images/icons/compare.png')}}" alt="">
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="{{url('wishlists')}}" title="">
                                            <img src="{{asset('images/icons/wishlist.png')}}" alt="">
                                        </a>
                                    </li>
                                </ul><!-- /.menu-compare-wishlist -->
                            </div><!-- /.inner-box -->
                            <div class="inner-box">
                                <a href="{{url('carts')}}" title="">
                                    <div class="icon-cart">
                                        <img src="{{asset('images/icons/cart.png')}}" alt="">
                                        @if($carts != null)
                                            <span>{{count($carts)}}</span>
                                            @php
                                                $ids = array_map(function ($array) {return $array['product_id'];}, $carts);
                                                $products = \App\Model\Product\Product::find($ids);
                                                $sum = $i = 0;
                                                foreach($products as $product){
                                                    $sum += $carts[$i]['qty']*($product->salePrice-(($product->salePrice*$product->discount_value)/100));
                                                }
                                            @endphp
                                        @endif
                                    </div>
                                    <div class="price">
                                        ৳@if($carts != null) {{ number_format($sum) }} @else 0 @endif
                                    </div>
                                </a>
                                @if($carts != null)
                                <div class="dropdown-box">
                                    <ul>
                                        @foreach($products as $product)
                                        <li>
                                            <div class="img-product">
                                                @foreach($product->images as $image)@endforeach
                                                <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                            </div>
                                            <div class="info-product">
                                                <div class="name">
                                                    {{ $product->productName }}
                                                </div>
                                                <div class="price">
                                                    <span>{{ $carts[$i]['qty'] }} x</span>
                                                    <span>৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <span class="delete" id="delete-cart" data-id="{{$product->id}}" data-url="{{url('carts/'.$product->id)}}">x</span>
                                        </li>
                                            @php $i++; @endphp
                                        @endforeach
                                    </ul>
                                    <div class="total">
                                        <span>Subtotal:</span>
                                        <span class="price">৳ {{ number_format($sum) }}</span>
                                    </div>
                                    <div class="btn-cart">
                                        <a href="{{url('carts')}}" class="view-cart" title="">View Cart</a>
                                        <a href="{{url('orders/create')}}" class="check-out" title="">Checkout</a>
                                    </div>
                                </div>
                                @endif
                            </div><!-- /.inner-box -->
                        </div><!-- /.box-cart -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.header-middle -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-2">
                        <div id="mega-menu">
                            <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                            <ul class="menu">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{url('productsByCat/'.$category->id)}}" title="" @if(count($category->childs))class="dropdown"@endif>
											<span class="menu-img">
												<img src="{{asset('storage/images/icons/menu/'.$category->catImage)}}" alt="">
											</span>
                                        <span class="menu-title">
												{{ $category->categoryName }}
											</span>
                                    </a>
                                    @if(count($category->childs))
                                    <div class="drop-menu">
                                        @include('product.manageCatMenu',['childs' => $category->childs])
                                        <div class="one-third">
                                            <ul class="banner">
                                                <li>
                                                    <div class="banner-text">
                                                        <div class="banner-title">
                                                            Headphones
                                                        </div>
                                                        <div class="more-link">
                                                            <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="banner-img">
                                                        <img src="images/banner_boxes/menu-01.png" alt="">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="banner-text">
                                                        <div class="banner-title">
                                                            TV & Audio
                                                        </div>
                                                        <div class="more-link">
                                                            <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="banner-img">
                                                        <img src="images/banner_boxes/menu-02.png" alt="">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="banner-text">
                                                        <div class="banner-title">
                                                            Computers
                                                        </div>
                                                        <div class="more-link">
                                                            <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="banner-img">
                                                        <img src="images/banner_boxes/menu-03.png" alt="">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="one-third">
                                            <ul class="banner">
                                                <li>
                                                    <div class="banner-text">
                                                        <div class="banner-title">
                                                            Headphones
                                                        </div>
                                                        <div class="more-link">
                                                            <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="banner-img">
                                                        <img src="images/banner_boxes/menu-01.png" alt="">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="banner-text">
                                                        <div class="banner-title">
                                                            TV & Audio
                                                        </div>
                                                        <div class="more-link">
                                                            <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="banner-img">
                                                        <img src="images/banner_boxes/menu-02.png" alt="">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="banner-text">
                                                        <div class="banner-title">
                                                            Computers
                                                        </div>
                                                        <div class="more-link">
                                                            <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="banner-img">
                                                        <img src="images/banner_boxes/menu-03.png" alt="">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-9 col-10">
                        <div class="nav-wrap">
                            <div id="mainnav" class="mainnav">
                                <ul class="menu">
                                    <li class="column-1">
                                        <a href="{{url('/')}}" title="">Home</a>
                                    </li><!-- /.column-1 -->

                                    <li class="column-1">
                                        <a href="#" title="">Offers</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="{{URL::to('offers/0')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Best Deal</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('offers/1')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Hot Deal</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('offers/2')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Seasonal</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('offers/3')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Stock Clearance</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('offers/4')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Buy One Get One</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('offers/5')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>EMI</a>
                                            </li>
                                        </ul><!-- /.submenu -->
                                    </li><!-- /.column-1 -->
                                    <li class="column-1">
                                        <a href="{{url('shop')}}" title="">products</a>
                                    </li><!-- /.column-1 -->
                                    <li class="has-mega-menu">
                                        <a href="{{URL::to('/brand')}}" title="">Brands</a>
                                        <div class="submenu">
                                            <div class="row">
                                                @foreach($brands as $brand)
                                                    <div class="col-lg-2 col-md-12">
                                                        <ul class="submenu-child">
                                                        </ul>
                                                        <div class="show">
                                                            <a href="{{URL::to('/productsByBrand/'.$brand->id)}}" title=""><span class="menu-img"><img src="{{asset('storage/images/brands/'.$brand->brandLogo)}}" style="height: 30px;width: 30px"  alt=""></span>{{$brand->brandName}}</a>
                                                        </div>
                                                    </div><!-- /.col-lg-3 col-md-12 -->
                                                @endforeach
                                            </div><!-- /.row -->
                                        </div><!-- /.submenu -->
                                    </li><!-- /.has-mega-menu -->
                                    <li class="has-mega-menu">
                                        <a href="{{URL::to('/country')}}" title="">Countries</a>
                                        <div class="submenu">
                                            <div class="row">
                                                @foreach($countries as $country)
                                                    <div class="col-lg-2 col-md-12">
                                                        <ul class="submenu-child">
                                                        </ul>
                                                        <div class="show">
                                                            <a href="{{URL::to('/productsByCountry/'.$country->id)}}" title=""><span class="menu-img"><img src="{{asset('storage/images/country/flag/'.$country->flag)}}" style="height: 30px;width: 30px;border-radius: 50%"  alt=""></span>{{$country->name}}</a>
                                                        </div>
                                                    </div><!-- /.col-lg-3 col-md-12 -->
                                                @endforeach
                                            </div><!-- /.row -->
                                        </div><!-- /.submenu -->
                                    </li><!-- /.has-mega-menu -->
                                    <li class="column-1">
                                        <a href="{{url('blog')}}" title="">Blog</a>
                                    </li><!-- /.column-1 -->
                                    <li class="column-1">
                                        <a href="#" title="">Help</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="{{URL::to('faq')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>FAQ</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('term-condition')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Terms & Condition</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('order-tracking')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('about')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>About</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('contact')}}" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a>
                                            </li>
                                        </ul><!-- /.submenu -->
                                    </li><!-- /.column-1 -->
                                </ul><!-- /.menu -->
                            </div><!-- /.mainnav -->
                        </div><!-- /.nav-wrap -->
                        <div class="today-deal">
                            <a href="@if (url()->current() == url('/')) #deal @else {{url('/#deal')}} @endif" title="">TODAY DEALS</a>
                        </div><!-- /.today-deal -->
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->
                    </div><!-- /.col-md-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.header-bottom -->
    </section><!-- /#header -->


        @yield('content')


        <footer class="style1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-ft widget-about">
                            <div class="logo logo-ft">
                                <a href="{{asset('/')}}" title="">
                                    <img src="{{asset('images/logos/logo.png')}}" alt="">
                                </a>
                            </div><!-- /.lgo-ft -->
                            <div class="widget-content">
                                <div class="icon">
                                    <img src="{{asset('images/icons/call.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <p class="questions">Got Questions ? Call us 24/7!</p>
                                    <p class="phone">Call Us: (888) 1234 56789</p>
                                    <p class="address">
                                        PO Box CT16122 Collins Street West, Victoria 8007,<br />Australia.
                                    </p>
                                </div>
                            </div><!-- /.widget-content -->
                            <ul class="social-list">
                                <li>
                                    <a href="#" title="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <i class="fa fa-google" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul><!-- /.social-list -->
                        </div><!-- /.widget-about -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-ft widget-categories-ft">
                            <div class="widget-title">
                                <h3>Find By Categories</h3>
                            </div><!-- /.widget-title -->
                            <ul class="cat-list-ft">
                                <li>
                                    <a href="#" title="">Desktops</a>
                                </li>
                                <li>
                                    <a href="#" title="">Laptops & Notebooks</a>
                                </li>
                                <li>
                                    <a href="#" title="">Components</a>
                                </li>
                                <li>
                                    <a href="#" title="">Tablets</a>
                                </li>
                                <li>
                                    <a href="#" title="">Software</a>
                                </li>
                                <li>
                                    <a href="#" title="">Phones & PDAs</a>
                                </li>
                                <li>
                                    <a href="#" title="">Cameras</a>
                                </li>
                            </ul><!-- /.cat-list-ft -->
                        </div><!-- /.widget-categries-ft -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-2 col-md-6">
                        <div class="widget-ft widget-menu">
                            <div class="widget-title">
                                <h3>Customer Care</h3>
                            </div><!-- /.widget-title -->
                            <ul>
                                <li>
                                    <a href="#" title="">
                                        Contact us
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        Site Map
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        Wish List
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        Delivery Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.widget-menu -->
                    </div><!-- /.col-lg-2 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-ft widget-newsletter">
                            <div class="widget-title">
                                <h3>Sign Up To New Letter</h3>
                            </div><!-- /.widget-title -->
                            <p>Make sure that you never miss our interesting <br />
                                news by joining our newsletter program
                            </p>
                            <form action="{{URL::to('subscribes')}}" class="subscribe-form" method="post" accept-charset="utf-8">
                                {{csrf_field()}}
                                <div class="subscribe-content">
                                    <input type="email" name="email" class="subscribe-email" placeholder="Your E-Mail" required>
                                    <button type="submit"><img src="{{asset('images/icons/right-2.png')}}" alt=""></button>
                                </div>
                            </form><!-- /.subscribe-form -->
                            <ul class="pay-list">
                                <li>
                                    <a href="#" title="">
                                        <img src="{{asset('images/logos/ft-01.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img src="{{asset('images/logos/ft-02.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img src="{{asset('images/logos/ft-03.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img src="{{asset('images/logos/ft-04.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="">
                                        <img src="{{asset('images/logos/ft-05.png')}}" alt="">
                                    </a>
                                </li>
                            </ul><!-- /.pay-list -->
                        </div><!-- /.widget-newletter -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-apps">
                            <div class="widget-title">
                                <h3>Mobile Apps</h3>
                            </div><!-- /.widget-title -->
                            <ul class="app-list">
                                <li class="app-store">
                                    <a href="#" title="">
                                        <div class="img">
                                            <img src="{{asset('images/icons/app-store.png')}}" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>App Store</h4>
                                            <p>Available now on the</p>
                                        </div>
                                    </a>
                                </li><!-- /.app-store -->
                                <li class="google-play">
                                    <a href="#" title="">
                                        <div class="img">
                                            <img src="{{asset('images/icons/google-play.png')}}" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>Google Play</h4>
                                            <p>Get in on</p>
                                        </div>
                                    </a>
                                </li><!-- /.google-play -->
                            </ul><!-- /.app-list -->
                        </div><!-- /.widget-apps -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /footer -->

        <section class="footer-bottom style1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright">All Rights Reserved © Discountzshop <script>document.write(new Date().getFullYear());</script></p>
                        <p class="btn-scroll">
                            <a href="#" title="">
                                <img src="{{asset('images/icons/top.png')}}" alt="">
                            </a>
                        </p>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.footer-bottom -->
    </div><!-- /.boxed -->
    @include('messages')
    <!-- Javascript -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.circlechart.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/bootstrap-treeview.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script>
    <script type="text/javascript" src="{{asset('js/gmap3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waves.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.countdown.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <!-- Custom Javascript goes here -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5cc196cbee912b07bec4cd86/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    @yield('script')

</body>

</html>
