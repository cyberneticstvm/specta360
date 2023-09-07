<div class="col-lg-3">
    <div class="widget-category mb-30">
        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
        <ul class="categories">
            @forelse(getActiveCategories() as $key => $cat)
                <li><a href="{{ route('product.category', [$cat->slug, $cat->id]) }}">{{ $cat->name }}</a></li>
            @empty
            @endforelse
        </ul>
    </div>
    <div class="widget-category mb-30">
        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Sort by</h5>
        <ul class="categories">
            <li><a href="shop-grid-right.html">Popularity</a></li>
            <li><a href="shop-grid-right.html">Average rating</a></li>
            <li><a href="shop-grid-right.html">Price: Low to High</a></li>
            <li><a href="shop-grid-right.html">Price: High to Low</a></li>
        </ul>
    </div>
    <div class="widget-category mb-30">
        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Filter by</h5>
        <ul class="categories">
            <li><a href="shop-grid-right.html">Women</a></li>
            <li><a href="shop-grid-right.html">Men</a></li>
            <li><a href="shop-grid-right.html">Kids</a></li>
            <li><a href="shop-grid-right.html">Unisex</a></li>
        </ul>
    </div>
    <div class="widget-category mb-30">
        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Price Range</h5>
        <div class="price_range range">
            <div class="price-filter">
                <div class="price-filter-inner">
                    <div id="slider-range"></div>
                    <div class="price_slider_amount">
                        <div class="label-input">
                            <span>Range:</span><input type="text" id="amount" name="price" data-min="{{ getActiveProducts()->min('selling_price') }}" data-max="{{ getActiveProducts()->max('selling_price') }}" placeholder="Add Your Price" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-img wow fadeIn mb-45mb-lg-0 animated d-lg-block d-none">
        <img src="{{ asset('/frontend/assets/imgs/banner/banner-11.jpg') }}" alt="">
        <div class="banner-text">
            <span>Women Zone</span>
            <h4>Save 17% on <br>Office Dress</h4>
            <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
        </div>
    </div>
</div>