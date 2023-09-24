@extends("store.base")
@section("content")
<main class="main">
<div class="page-header breadcrumb-wrap">
    <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Compare
            </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    @if(!getCompareListedItems()->isEmpty())
                    <table class="table text-center">
                        <tbody>
                            <tr class="pr_image">
                                <td class="text-muted font-md fw-600">Preview</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                    <td class="row_img"><img src="{{ url($item->product->image) }}" alt="{{ $item->product->name }}" width="25%"></td>
                                @endforeach
                            </tr>
                            <tr class="pr_title">
                                <td class="text-muted font-md fw-600">Name</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="product_name">
                                    <h5><a href="/product/{{ $item->product->slug }}/{{ $item->product->id }}">{{ $item->product->name }}</a></h5>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_price">
                                <td class="text-muted font-md fw-600">Price</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="product_price"><span class="price">₹{{ $item->product->selling_price }}</span></td>
                                @endforeach
                            </tr>
                            <tr class="pr_rating">
                                <td class="text-muted font-md fw-600">Rating</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td>
                                    <div class="rating_wrap">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="rating_num">(125)</span>
                                    </div>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="description">
                                <td class="text-muted font-md fw-600">Description</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="row_text font-xs">
                                    <p>{!! $item->product->short_decription !!}</p>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_color">
                                <td class="text-muted font-md fw-600">Color</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="row_color">
                                    <ul class="list-filter color-filter">
                                        @forelse($item->product->colors() as $key1 => $color)
                                        <li><a href="#" data-color="{{ ucfirst($color->name) }}"><span class="product-color-{{ strtolower($color->name) }}"></span></a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_size">
                                <td class="text-muted font-md fw-600">Sizes Available</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="row_size">
                                    <ul class="list-filter size-filter mt-15 font-small">
                                        @forelse($item->product->sizes() as $key1 => $size)
                                        <li><a href="#">{{ $size->name }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_stock">
                                <td class="text-muted font-md fw-600">Stock status</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                    <td class="row_stock"><span>{!! $item->product->stockStatus() !!}</span></td>
                                @endforeach
                            </tr>
                            <tr class="pr_dimensions">
                                <td class="text-muted font-md fw-600">Tags</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="row_dimensions">{{ $item->product->tags()->pluck('name')->implode(', ') }}</td>
                                @endforeach
                            </tr>
                            <tr class="pr_add_to_cart">
                                <td class="text-muted font-md fw-600">Buy now</td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="row_btn"><button class="btn  btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button></td>
                                @endforeach
                            </tr>
                            <tr class="pr_remove text-muted">
                                <td class="text-muted font-md fw-600"></td>
                                @foreach(getCompareListedItems() as $key => $item)
                                <td class="row_remove">
                                    <a href="{{ route('remove.compare.item', $item->id) }}"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    @else
                        <h5 class="text-danger">No items found in your comparison list!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection