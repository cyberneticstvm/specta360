@extends("store.base")
@section("content")
<section class="pt-25 wow fadeIn animated featured section-padding">
    <div class="container">
        <div class="row mb-50 align-items-center">
            <div class="col-md-12">
                <div class="totall-product">
                    <p> We found <strong class="text-brand">{{ $vendors->count() }}</strong> items for you!</p>
                </div>
            </div>
        </div>
        <div class="position-relative">            
            <div class="row wow fadeIn animated">
                @forelse($vendors as $key => $item)
                <div class="col-lg-3 col-md-6 mb-md-3 mb-lg-0">
                    <div class="blog-card border-radius-10 overflow-hidden">
                        <img src="{{ ($item->photo) ? url($item->photo) : asset('frontend/assets/imgs/page/avatar-1.jpg') }}" alt="" class="border-radius-10 mb-30 hover-up">
                        <h4 class="fw-500 mb-0 text-center">{{ $item->name }}</h4>
                        <p class="fw-400 text-brand mb-10 text-center">{{ $item->products->count() }} Products</p>
                        <p>Member Since: {{ $item->created_at->format('Y') }}</p>
                        <p>Reviews & Ratings: </p>
                        <p>Contact Details: {{ $item->address.', '. $item->phone }}</p>
                        <div class="text-center mt-3 mb-1"><a class="btn btn-primary" href="{{ route('product.vendor', [$item->name ,$item->id]) }}">Visit Store</a></div>
                    </div>
                </div>
                <!--col-->
                @empty
                @endforelse
            </div>
            <!--pagination-->
            <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {!! $vendors->withQueryString()->links('pagination::bootstrap-5') !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection