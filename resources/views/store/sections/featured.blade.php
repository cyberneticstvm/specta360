<section class="section-padding">
    <div class="container pb-20">
        <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
        <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
            <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                @forelse(getActiveBrands() as $key => $item)
                <div class="brand-logo">
                    <img class="img-grey-hover" src="{{ url($item->image) }}" alt="{{ $item->name }}">
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>