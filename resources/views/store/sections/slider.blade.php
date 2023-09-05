<section class="home-slider position-relative pt-25 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="position-relative">
                    <div class="hero-slider-1 style-3 dot-style-1 dot-style-1-position-1">
                    @forelse(getActiveSliders() as $key => $item)
                        <div class="single-hero-slider single-animation-wrap">
                            <div class="container">
                                <div class="slider-1-height-3 slider-animated-1">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{ $item->title }}</h4>
                                        <h2 class="animated fw-900">{{ $item->short_title }}</h2>
                                        <h1 class="animated fw-900 text-brand">{{ $item->bottom_title }}</h1>
                                        <p class="animated">{{ $item->short_description }}</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="/"> Shop Now </a>
                                    </div>
                                    <div class="slider-img">
                                        <img src="{{ url($item->image) }}" alt="{{ $item->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow style-3"></div>
                </div>
            </div>
            <div class="col-lg-3 d-md-none d-lg-block">
                <div class="banner-img banner-1 wow fadeIn  animated home-3">
                    <img class="border-radius-10" src="{{ count(getActiveCategories()) > 0 ? url(getActiveCategories()->first()->image) : '#' }}" alt="">
                    <div class="banner-text">
                        <span>Accessories</span>
                        <h4>Save 17% on <br>Frame Accessories</h4>
                        <a href="/">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
                <div class="banner-img banner-2 wow fadeIn  animated mb-0">
                    <img class="border-radius-10" src="{{ count(getActiveBanners()) > 0 ? url(getActiveBanners()->skip(3)->take(1)->first()->image) : '#' }}" alt="">
                    <div class="banner-text">
                        <span>Smart Offer</span>
                        <h4>Save 20% on <br>Contact Lenses</h4>
                        <a href="/">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>