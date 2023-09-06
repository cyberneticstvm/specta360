<section class="pt-25 pb-15">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
            <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                @forelse(getActiveProducts()->take(10) as $key => $item)
                <div class="product-cart-wrap small hover-up">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="shop-product-right.html">
                                <img class="default-img" src="{{ ($item->image) ? url($item->image) : asset('/frontend/assets/imgs/shop/product-2-1.jpg') }}" alt="">
                                <img class="hover-img" src="{{ ($item->images->first()) ? url($item->images->first()->name) : asset('/frontend/assets/imgs/shop/product-2-2.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                            <i class="fi-rs-eye"></i></a>
                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                            <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">New</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="shop-product-right.html">{{ $item->name }}</a></h2>
                        <div class="rating-result" title="90%">
                            <span>
                            </span>
                        </div>
                        <div class="product-price">
                            <span>₹{{ $item->selling_price }}</span>
                            <span class="old-price">₹{{ $item->mrp }}</span>
                        </div>
                    </div>
                </div>
                <!--End product-cart-wrap-2-->
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>