@extends("store.base")
@section("content")
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Brand
                <span></span> {{ ($products->first()) ? $products->first()->brand->name : '' }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                        </div>
                        @include("store.pages.sections.sortpanel")
                    </div>
                    <div class="row product-grid-3">
                        @forelse($products as $key => $item)
                            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', [$item->slug, $item->id]) }}">
                                                <img class="default-img" src="{{ url($item->image) }}" alt="{{ $item->name }}">
                                                <img class="hover-img" src="{{ ($item->images->first()) ? url($item->images->first()->name) : asset('/frontend/assets/imgs/shop/product-9-1.jpg') }}" alt="{{ $item->name }}">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up quickView" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $item->id }}"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-shuffle compare" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Featured</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="/">{{ $item->category->name }}</a>
                                        </div>
                                        <h2><a href="{{ route('product.details', [$item->slug, $item->id]) }}">{{ $item->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{ settings()->currency_symbol.$item->selling_price }} </span>
                                            <span class="old-price">{{ settings()->currency_symbol.$item->mrp }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <h5 class="text-danger">No products found. Please explore our other products.</h5>
                        @endforelse
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    @include("store.pages.sections.filterpanel")
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @forelse(getActiveProducts()->take(3) as $key => $item)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ url($item->image) }}" alt="{{ $item->name }}">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('product.details', [$item->slug, $item->id]) }}">{{ $item->name }}</a></h5>
                                <p class="price mb-0 mt-5">₹{{ $item->selling_price }}</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="{{ asset('/frontend/assets/imgs/banner/banner-11.jpg') }}" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection