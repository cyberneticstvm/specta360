@extends("store.base")
@section("content")
<main class="main">
<div class="page-header breadcrumb-wrap">
    <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Product Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody class="mainCart">                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="mb-30 mt-50">
                    <div class="heading_s1 mb-3">
                        <h4>Apply Coupon</h4>
                    </div>
                    <div class="total-amount">
                        <div class="left">
                            <div class="coupon">
                                <form id="frmApplyCoupon" action="{{ route('cart.apply.coupon') }}" method="post">
                                    @csrf
                                    <div class="form-row row justify-content-center">
                                        <div class="form-group col-lg-6">
                                            <input class="font-medium" name="coupon" placeholder="Enter Your Coupon">
                                            @error('coupon')
                                            <small class="text-danger">{{ $errors->first('coupon') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <button type="submit" class="btn btn-sm btn-coupon-apply btn-submit"><i class="fi-rs-label mr-10"></i>Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="border p-md-4 p-30 border-radius cart-totals">
                    <div class="heading_s1 mb-3">
                        <h4>Cart Totals</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount text-end"><span class="font-lg fw-900 text-brand cartSubTot"></span></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount text-end"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label couponName"></td>
                                    <td class="cart_total_amount text-end couponAmount"></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount text-end"><strong><span class="font-xl fw-900 text-brand cartTot"></span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end"><a href="#" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection