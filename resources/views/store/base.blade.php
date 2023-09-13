<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/assets/imgs/theme/favicon.svg') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/main.css?v=3.4') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}">
</head>

<body>
    <div class="currencySymbol d-none">{{ settings()->currency_symbol }}</div>
    @include("store.sections.quickview")
    <header class="header-area header-style-4 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><i class="fi-rs-smartphone"></i> <a href="#">(+01) - 2345 - 6789</a></li>
                                <li><i class="fi-rs-marker"></i><a  href="page-contact.html">Our location</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Get great devices up to 50% off <a href="shop-grid-right.html">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="shop-grid-right.html">Shop now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="{{ asset('/frontend/assets/imgs/theme/logo.svg') }}" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option>All Categories</option>
                                    @forelse(getActiveCategories() as $key => $cat)
                                        <option>{{ $cat->name }} - ({{ $cat->products->count() }})</option>
                                    @empty
                                    @endforelse
                                </select>
                                <input type="text" placeholder="Search for items...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{ route('show.compare.items') }}">
                                        <i class="fi-rs-shuffle xl"></i>
                                        <span class="pro-count blue comCount"></span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="javascript:void(0)">
                                        <img class="svgInject" alt="Specta360" src="{{ asset('/frontend/assets/imgs/theme/icons/icon-heart.svg') }}">
                                        <span class="pro-count blue wlCount"></span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="shop-cart.html">
                                        <img alt="Spect1360" src="{{ asset('/frontend/assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span class="pro-count blue cartCount"></span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <div class="miniCart"></div>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span></span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart.html" class="outline">View cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-info header-action-icon-2">
                                    <ul>
                                        <li>
                                            <a class="language-dropdown-active" href="#"><i class="fi-rs-user xl"></i><i class="fi-rs-angle-small-down"></i></a>
                                            <ul class="language-dropdown">
                                                @auth
                                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                                <li><a href="{{ route('user.dashboard') }}">My Orders</a></li>
                                                <li><a href="{{ route('user.dashboard') }}">My Wishlist</a></li>
                                                <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                                @else
                                                <li><a href="{{ route('login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                                @endauth
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('/frontend/assets/imgs/theme/logo.svg') }}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    @forelse(getActiveCategories() as $key => $cat)
                                    <li class="has-children">
                                        <a href="shop-grid-right.html"><img class="rounded img-fluid me-3" src="{{ $cat->image }}" width="15%" alt="{{ $cat->name }}" />{{ $cat->name }}</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">{{ $cat->name }}</span></li>
                                                                @forelse($cat->subCategory->take(10) as $key1 => $sub)
                                                                    <li><a class="dropdown-item nav-link nav_item" href="{{ route('product.subcategory', [$sub->slug, $sub->id]) }}">{{ $sub->name }} - ({{ $sub->products->count() }})</a></li>
                                                                @empty
                                                                @endforelse
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                @forelse($cat->subCategory->skip(10) as $key1 => $sub)
                                                                <li><a class="dropdown-item nav-link nav_item" href="{{ route('product.subcategory', [$sub->slug, $sub->id]) }}">{{ $sub->name }} - ({{ $sub->products->count() }})</a></li>
                                                                @empty
                                                                @endforelse
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="{{ count(getActiveBanners()->skip(4)->take(1)) > 0 ? url(getActiveBanners()->skip(4)->take(1)->first()->image) : '' }}" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>{{ count(getActiveBanners()->skip(4)->take(1)) > 0 ? getActiveBanners()->skip(4)->take(1)->first()->label : '' }}</h6>
                                                            <h4>{{ count(getActiveBanners()->skip(4)->take(1)) > 0 ? getActiveBanners()->skip(4)->take(1)->first()->title : '' }}</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2">
                                                        <img src="{{ count(getActiveBanners()->skip(5)->take(1)) > 0 ? url(getActiveBanners()->skip(5)->take(1)->first()->image) : '' }}" alt="menu_banner2">
                                                        <div class="banne_info">
                                                            <h6>{{ count(getActiveBanners()->skip(5)->take(1)) > 0 ? getActiveBanners()->skip(5)->take(1)->first()->label : '' }}</h6>
                                                            <h4>{{ count(getActiveBanners()->skip(5)->take(1)) > 0 ? getActiveBanners()->skip(5)->take(1)->first()->title : '' }}</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    @empty
                                    @endforelse
                                    <!--@forelse(getActiveCategories()->skip(1)->take(1) as $key => $cat)
                                        <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>{{ $cat->name }}</a></li>
                                    @empty
                                    @endforelse-->
                                    <li>
                                        <ul class="more_slide_open" style="display: none;">
                                            <li><a href="javascript:void(0)"><img class="rounded img-fluid me-3" src="{{ asset('/backend/assets/imgs/people/avatar1.jpg') }}" width="15%" alt="No Items" />No more items to display.</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="more_categories">Show more...</div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="position-static"><a href="javascript:void(0)">Popular Categories <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            @forelse(getActiveCategories()->take(3) as $key => $cat)
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">{{ $cat->name }}</a>
                                                <ul>
                                                    @forelse($cat->subCategory as $key1 => $sub)
                                                    <li><a href="{{ route('product.subcategory', [$sub->slug, $sub->id]) }}">{{ $sub->name }} - ({{ $sub->products->count() }})</a></li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </li>
                                            @empty
                                            @endforelse
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/banner/menu-banner.jpg') }}" alt="Evara"></a>
                                                    <div class="menu-banner-content">
                                                        <h4>Hot deals</h4>
                                                        <h3>Don't miss<br> Trending</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="shop-product-right.html">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-banner-discount">
                                                        <h3>
                                                            <span>35%</span>
                                                            off
                                                        </h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/">New Arrivals</a>
                                    </li>
                                    <li>
                                        <a href="/">Women</a>
                                    </li>
                                    <li>
                                        <a href="/">Men</a>
                                    </li>
                                    <li>
                                        <a href="/">Kids</a>
                                    </li>
                                    <li>
                                        <a href="/">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-headset"></i><span>Hotline</span> 1900 - 888 </p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('show.compare.items') }}">
                                    <img alt="Evara" src="{{ asset('/frontend/assets/imgs/theme/icons/icon-compare.svg') }}">
                                    <span class="pro-count white comCount"></span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img alt="Evara" src="{{ asset('/frontend/assets/imgs/theme/icons/icon-heart.svg') }}">
                                    <span class="pro-count white wlCount"></span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="Evara" src="{{ asset('/frontend/assets/imgs/theme/icons/icon-cart.svg') }}">
                                    <span class="pro-count white cartCount"></span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Evara" src="{{ asset('/frontend/assets/imgs/shop/thumbnail-3.jpg') }}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Evara" src="{{ asset('/frontend/assets/imgs/shop/thumbnail-4.jpg') }}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="/"><img src="{{ asset('/frontend/assets/imgs/theme/logo.svg') }}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                @forelse(getActiveCategories() as $key => $cat)
                                    <li><a href="/"><img class="rounded img-fluid me-1" src="{{ $cat->image }}" width="15%" alt="{{ $cat->name }}" />{{ $cat->name }}</a></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Popular Categories</a>
                                <ul class="dropdown">
                                    @forelse(getActiveCategories() as $key => $cat)
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">{{ $cat->name }}</a>
                                        <ul class="dropdown">
                                            @forelse($cat->subCategory as $key1 => $sub)
                                            <li><a href="/">{{ $sub->name }}</a></li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                            <li><a href="/">New Arrivals</a></li>
                            <li><a href="/">Women</a></li>
                            <li><a href="/">Men</a></li>
                            <li><a href="/">Kids</a></li>
                            <li><a href="/">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a  href="page-contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login-register.html">Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    @yield("content")
    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="{{ asset('/frontend/assets/imgs/theme/icons/icon-email.svg') }}" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="{{ asset('/frontend/assets/imgs/theme/logo.svg') }}" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>562 Wellington Road, Street 32, San Francisco
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+01 2222 365 /(+91) 01 2345 6789
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Hours: </strong>10:00 - 18:00, Mon - Sat
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('/frontend/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Support Center</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ route('vendor.register') }}">Become a Vendor</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{ asset('/frontend/assets/imgs/theme/app-store.jpg') }}" alt=""></a>
                                    <a href="#" class="hover-up"><img src="{{ asset('/frontend/assets/imgs/theme/google-play.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="{{ asset('/frontend/assets/imgs/theme/payment-method.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">&copy; {{ date('Y') }}, <strong class="text-brand">Specta360</strong> - An Ultimate Specs Store</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        Developed and maintained by <a href="https://cybernetics.me" target="_blank">Cybernetics Tech</a>. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-5">Specta360</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('/frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('/frontend/assets/js/main.js?v=3.4') }}"></script>
    <script src="{{ asset('/frontend/assets/js/shop.js?v=3.4') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/frontend/assets/js/script.js') }}"></script>
    @include("store.message")
</body>

</html>