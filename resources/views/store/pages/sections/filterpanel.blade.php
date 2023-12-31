<div class="widget-category mb-30">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        @forelse(getActiveCategories() as $key => $cat)
            <li><a href="{{ route('product.category', [$cat->slug, $cat->id]) }}">{{ $cat->name }}</a></li>
        @empty
        @endforelse
    </ul>
</div>
<!-- Fillter By Price -->
<div class="sidebar-widget price_range range mb-30">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">Fill by price</h5>
        <div class="bt-1 border-color-1"></div>
    </div>
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
    <div class="list-group">
        <div class="list-group-item mb-10 mt-10">
            <label class="fw-900">Color</label>
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
            </div>
            <label class="fw-900 mt-15">Item Condition</label>
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
            </div>
        </div>
    </div>
    <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
</div>