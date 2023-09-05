<section class="banners mb-20">
    <div class="container">
        <div class="row">
            @forelse(getActiveBanners()->take(3) as $key => $item)
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow fadeIn animated">
                    <img src="{{ url($item->image) }}" alt="{{ $item->title }}">
                    <div class="banner-text">
                        <span>{{ $item->label }}</span>
                        <h4>{!! $item->title !!}</h4>
                        <a href="/">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>