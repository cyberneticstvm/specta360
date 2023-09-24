<section class="bg-grey-9 section-padding">
    <div class="container pt-15 pb-25">
        <div class="heading-tab d-flex">
            <div class="heading-tab-left wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Shop</span> by Gender</h3>
            </div>
            <div class="heading-tab-right wow fadeIn animated">
                <ul class="nav nav-tabs right no-border" id="myTab-1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Women</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Men</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Kids</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="banner-img style-2 wow fadeIn animated">
                    <img src="{{ asset('/frontend/assets/imgs/banner/banner-9.jpg') }}" alt="">
                    <div class="banner-text">
                        <span>Woman and Kids</span>
                        <h4 class="mt-5">Save 17% on <br>Branded Eyeware</h4>
                        <a href="shop-grid-right.html" class="text-white">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @forelse(getActiveProductsByTag(array('Women')) as $key => $item)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html">
                                                <img class="default-img" src="{{ $item->product->image }}" alt="">
                                                <img class="hover-img" src="{{ ($item->product->images->first()) ? url($item->product->images->first()->name) : asset('/frontend/assets/imgs/shop/product-1-2.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $item->id }}">
                                            <i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-shuffle compare" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Women</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $item->product->vendor->name }}</a>
                                        </div>
                                        <h2><a href="shop-product-right.html">{{ $item->product->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>70%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>₹{{ $item->product->selling_price }} </span>
                                            <span class="old-price">₹{{ $item->product->mrp }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h5 class="text-danger">No products found in Women Section</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->
                    <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-2-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                            @forelse(getActiveProductsByTag(array('Men')) as $key => $item)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html">
                                                <img class="default-img" src="{{ $item->product->image }}" alt="">
                                                <img class="hover-img" src="{{ ($item->product->images->first()) ? url($item->product->images->first()->name) : asset('/frontend/assets/imgs/shop/product-1-2.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $item->id }}">
                                            <i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-shuffle compare" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Men</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $item->product->vendor->name }}</a>
                                        </div>
                                        <h2><a href="shop-product-right.html">{{ $item->product->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>70%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>₹{{ $item->product->selling_price }} </span>
                                            <span class="old-price">₹{{ $item->product->mrp }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h5 class="text-danger">No products found in Men Section</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-3-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                @forelse(getActiveProductsByTag(array('Kids', 'Kid')) as $key => $item)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html">
                                                <img class="default-img" src="{{ $item->product->image }}" alt="">
                                                <img class="hover-img" src="{{ ($item->product->images->first()) ? url($item->product->images->first()->name) : asset('/frontend/assets/imgs/shop/product-1-2.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $item->id }}">
                                            <i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-shuffle compare" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Kids</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $item->product->vendor->name }}</a>
                                        </div>
                                        <h2><a href="shop-product-right.html">{{ $item->product->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>70%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>₹{{ $item->product->selling_price }} </span>
                                            <span class="old-price">₹{{ $item->product->mrp }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javascript:void(0);"><i class="fi-rs-heart wishList" data-id="{{ $item->id }}"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h5 class="text-danger">No products found in Kids Section</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>