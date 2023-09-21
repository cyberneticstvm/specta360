@extends("store.base")
@section("content")
<main class="main">
<div class="page-header breadcrumb-wrap">
    <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-25">
                    <h4>Delivery Address</h4>
                </div>                        
            </div>
            <div class="col-md-6">
                <form method="post" action="{{ route('cart.place.order') }}">
                    @csrf
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cart as $key => $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ url($item->options->image) }}" alt="#"></td>
                                        <td>
                                            <h5><a href="/product/{{ $item->options->slug }}/{{ $item->id }}">{{ $item->name }}</a></h5>
                                            <div>Size: {{ $item->options->size }}, Color: {{ $item->options->color }}<br /> Seller: <a href="/seller/{{ getActivevendors()->where('id', $item->options->vendor)->first()->name }}/{{ $item->options->vendor }} }}">{{ getActivevendors()->where('id', $item->options->vendor)->first()->name }}</a></div>
                                        </td>
                                        <td><span class="product-qty">{{ $item->qty }}</span></td>
                                        <td>{{ $item->options->currency.number_format($item->price, 2) }}</td>
                                    </tr>
                                    @empty
                                    @endforelse
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="3">{{ $item->options->currency.number_format($total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="3"><em>Free Shipping</em></td>
                                    </tr>
                                    @if(Session::has('coupon'))
                                    <tr>
                                        <th>Coupon ({{ session()->get('coupon')['coupon_name'] }})</th>
                                        <td colspan="3">{{ $item->options->currency }}{{ number_format(session()->get('coupon')['disc_amount'], 2) }} ({{ number_format(session()->get('coupon')['disc_per'], 0) }}%)</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="3" class="product-subtotal"><span class="font-xl text-brand fw-900">{{ $item->options->currency }}{{ number_format(session()->get('coupon')['total'], 2) }}</span></td>
                                    </tr>
                                    @else:
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="3" class="product-subtotal"><span class="font-xl text-brand fw-900">{{ $item->options->currency.number_format($total, 2) }}</span></td>
                                        </tr>
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>Payment</h5>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="">
                                    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                                    <div class="form-group collapse in" id="bankTranfer">
                                        <p class="text-muted mt-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                    </div>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Check Payment</label>
                                    <div class="form-group collapse in" id="checkPayment">
                                        <p class="text-muted mt-5">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                    </div>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
                                    <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>
                                    <div class="form-group collapse in" id="paypal">
                                        <p class="text-muted mt-5">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><a href="#" class="btn btn-fill-out btn-block mt-30">Place Order</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</main>
@endsection