<section class="mb-50 mt-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="banner-bg wow fadeIn animated" style="background-image: url('frontend/assets/imgs/banner/banner-8.jpg')">
                    <div class="banner-content">
                        <h5 class="text-grey-4 mb-15">Shop Today’s Deals</h5>
                        <h2 class="fw-600">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-25 wow fadeIn animated featured section-padding">
    <div class="container">
        <div class="row mb-50 align-items-center">
            <div class="col-md-6">
                <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">Vendors</h6>
                <h2 class="mb-15 wow fadeIn animated">Our Top Sellers</h2>
                <p class="text-grey-3 wow fadeIn animated">See our top selling vendors and explore their products!</p>
            </div>
            <div class="col-md-6 text-md-end mt-30">
                <a class="btn btn-outline btn-lg btn-brand-outline font-weight-bold text-brand text-hover-white border-radius-5 btn-shadow-brand hover-up" href="{{ route('vendor.all') }}">All Sellers</a>
            </div>
        </div>
        <div class="position-relative">
            <div class="row wow fadeIn animated">
                @forelse(getAllvendors()->where('status', 'active')->take(4) as $key => $item)
                <div class="col-lg-3 col-md-6 mb-md-3 mb-lg-0">
                    <div class="blog-card border-radius-10 overflow-hidden text-center">
                        <img src="{{ ($item->photo) ? url($item->photo) : asset('frontend/assets/imgs/page/avatar-1.jpg') }}" alt="" class="border-radius-10 mb-30 hover-up">
                        <h4 class="fw-500 mb-0">{{ $item->name }}</h4>
                        <p class="fw-400 text-brand mb-10">{{ $item->products->count() }} Products</p>
                        <div class="text-center"><a class="btn btn-primary" href="{{ route('product.vendor', [$item->name ,$item->id]) }}">Visit Store</a></div>
                    </div>
                </div>
                <!--col-->
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
<section class="mb-50 mt-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="banner-bg wow fadeIn animated" style="background-image: url('frontend/assets/imgs/banner/banner-8.jpg')">
                    <div class="banner-content">
                        <h5 class="text-grey-4 mb-15">Shop Today’s Deals</h5>
                        <h2 class="fw-600">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>