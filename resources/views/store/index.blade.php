@extends("store.base")
@section("content")
<main class="main">
    @include("store.sections.slider")
    @include("store.sections.banner")
    @include("store.sections.category")
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{ asset('/frontend/assets/imgs/banner/banner-4.png') }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="shop-grid-right.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    @include("store.sections.popular")
    @include("store.sections.deals")
    @include("store.sections.new-arrivals")
    @include("store.sections.featured")
    @include("store.sections.best-selling")
    @include("store.sections.blog")    
    <section class="mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="banner-bg wow fadeIn animated" style="background-image: url('frontend/assets/imgs/banner/banner-8.jpg')">
                        <div class="banner-content">
                            <h5 class="text-grey-4 mb-15">Shop Today’s Deals</h5>
                            <h2 class="fw-600">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                    <div class="banner-img wow fadeIn animated mb-md-4 mb-lg-0">
                        <img src="{{ asset('/frontend/assets/imgs/banner/banner-10.jpg') }}" alt="">
                        <div class="banner-text">
                            <span>Shoes Zone</span>
                            <h4>Save 17% on <br>All Items</h4>
                            <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated">Deals & Outlet</h4>
                    <div class="product-list-small wow fadeIn animated">
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-3.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Fish Print Patched T-shirt</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-4.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Vintage Floral Print Dress</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-5.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Multi-color Stripe Circle Print T-Shirt</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated">Top Selling</h4>
                    <div class="product-list-small wow fadeIn animated">
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-6.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Geometric Printed Long Sleeve Blosue</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-7.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Print Patchwork Maxi Dress</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-8.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Daisy Floral Print Straps Jumpsuit</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated">Hot Releases</h4>
                    <div class="product-list-small wow fadeIn animated">
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-9.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Floral Print Casual Cotton Dress</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-1.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Ruffled Solid Long Sleeve Blouse</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img src="{{ asset('/frontend/assets/imgs/shop/thumbnail-2.jpg') }}" alt=""></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h4 class="title-small">
                                    <a href="shop-product-right.html">Multi-color Print V-neck T-Shirt</a>
                                </h4>
                                <div class="product-price">
                                    <span>$238.85 </span>
                                    <span class="old-price">$245.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container pb-25">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('/frontend/assets/imgs/theme/icons/feature-1.png') }}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('/frontend/assets/imgs/theme/icons/feature-2.png') }}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('/frontend/assets/imgs/theme/icons/feature-3.png') }}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('/frontend/assets/imgs/theme/icons/feature-4.png') }}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('/frontend/assets/imgs/theme/icons/feature-5.png') }}" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('/frontend/assets/imgs/theme/icons/feature-6.png') }}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection