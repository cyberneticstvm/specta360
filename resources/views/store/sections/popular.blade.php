<section class="popular-categories section-padding mt-15">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
            <div class="carausel-6-columns" id="carausel-6-columns">
                @forelse(getActiveCategories() as $key => $item)
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="/category/{{ $item->slug }}"><img src="{{ ($item->image) ? url($item->image) : asset('/frontend/assets/imgs/shop/category-thumb-1.jpg') }}" alt=""></a>
                    </figure>
                    <h5><a href="/category/{{ $item->slug }}">{{ $item->name }}</a></h5>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>