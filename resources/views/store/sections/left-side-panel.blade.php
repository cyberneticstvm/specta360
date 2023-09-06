<div class="col-lg-3">
    <div class="widget-category mb-30">
        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
        <ul class="categories">
            @forelse(getActiveCategories() as $key => $cat)
                <li><a href="shop-grid-right.html">{{ $cat->name }}</a></li>
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
        <div class="price-content">
            <div>
                <label>Min</label>
                <p id="min-value"><span class='rupee'>₹</span>{{ number_format(getActiveProducts()->min('selling_price'), 0) }}</p>
            </div>
            <div>
                <label>Max</label>
                <p id="max-value"><span class='rupee'>₹</span>{{ number_format(getActiveProducts()->max('selling_price'), 0) }}</p>
            </div>
        </div>
        <div class="range-slider">
            <input type="range" class="min-price" id="min-price" value="{{ getActiveProducts()->min('selling_price') }}" min="{{ getActiveProducts()->min('selling_price') }}" max="{{ getActiveProducts()->max('selling_price') }}" step="10">
            <input type="range" class="max-price" id="max-price" value="{{ getActiveProducts()->max('selling_price') }}" min="{{ getActiveProducts()->min('selling_price') }}" max="{{ getActiveProducts()->max('selling_price') }}" step="10">
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