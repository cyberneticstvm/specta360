@extends("store.base")
@section("content")
<main class="main">
    <section class="pt-25 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="wishlist-tab" data-bs-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="false"><i class="fi-rs-heart mr-10"></i>Wishlist</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="fi-rs-settings mr-10"></i>Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{ Auth::user()->name }}! </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Wishlisted Items</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table shopping-summery text-center">
                                            <thead>
                                                <tr class="main-heading">
                                                    <th scope="col" colspan="2">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Remove</th>
                                                </tr>
                                            </thead><tbody>
                                            @forelse(getWishListedItems() as $key => $item)
                                            <tr id="{{ $item->id }}">
                                                <td class="image product-thumbnail"><img src="{{ url($item->product->image) }}" alt="{{ $item->product->name }}"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a href="/product/{{$item->product->slug}}/{{$item->product_id}}">{{ $item->product->name }}</a></h5>
                                                </td>
                                                <td class="price" data-title="Price"><span>₹{{ $item->product->selling_price }} </span></td>
                                                <td class="text-center" data-title="Stock">
                                                    <span class="color3 font-weight-bold">{!! $item->product->stockStatus() !!}</span>
                                                </td>
                                                <td class="action" data-title="Remove"><a href="javascript:void(0)"><i class="fi-rs-trash rmWishList" data-id="{{ $item->id }}"></i></a></td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="5" class="text-center"><h5 class="text-danger">No items found in your Wishlist!</h5></tr>
                                            @endforelse
                                            </tbody></table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2020</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Orders tracking</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        @forelse($addresses as $key => $addr)
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">{{ ucfirst($addr->type) }} Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>{{ $addr->house_name }}, {{ $addr->area }}<br>
                                                        {{ $addr->city->name }}, {{ $addr->state->name }}<br>Pincode: {{ $addr->pincode }} <br>Phone: {{ $addr->mobile }}</address>
                                                    <p>Landmark: {{ $addr->landmark }}</p>
                                                    <p class="text-end"><a href="javascript:void(0)" class="btn-small addAddr" data-addrid="{{ $addr->id }}">Edit</a> | <a href="{{ route('address.delete', encrypt($addr->id)) }}" class="btn-small">Delete</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <h5 class="text-danger">No addresses found!</h5>
                                        @endforelse
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center"><a href="javascript:void(0)" class="addAddr" data-addrid="0">Add New Address</a></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('user.profile.update') }}">
                                                @csrf
                                                @method("PUT")
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Full Name <span class="required">*</span></label>
                                                        {{ html()->text($name='name', $value=Auth::user()->name)->class('form-control')->placeholder('Full Name')->required() }}
                                                        @error('name')
                                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Username</label>
                                                        {{ html()->text($name='username', $value=Auth::user()->username)->class('form-control')->placeholder('Username')->if((Auth::user()->username != ''), function($q){
                                                            return $q->disabled();
                                                        }) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        {{ html()->email($name='email', $value=Auth::user()->email)->class('form-control')->placeholder('Email') }}
                                                        @error('email')
                                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone <span class="required">*</span></label>
                                                        {{ html()->text($name='phone', $value=Auth::user()->phone)->class('form-control')->placeholder('Phone')->maxlength(10) }}
                                                        @error('phone')
                                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-submit btn-fill-out submit" name="submit" value="Submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Settings</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form method="post" action="{{ route('user.profile.settings.update') }}">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label>New Password <span class="required">*</span></label>
                                                                {{ html()->password($name='password', $value=NULL)->class('form-control')->placeholder('******') }}
                                                                @error('password')
                                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col">
                                                                <label>Confirm New Password <span class="required">*</span></label>
                                                                {{ html()->password($name='password_confirmation', $value=NULL)->class('form-control')->placeholder('******') }}
                                                                @error('password_confirmation')
                                                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 text-center">
                                                                <button type="submit" class="btn btn-submit btn-fill-out submit" name="submit" value="Submit">Update Password</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection