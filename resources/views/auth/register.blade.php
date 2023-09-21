@extends("store.base")
@section("content")
<main class="main">
    <section class="pt-25 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Register</h3>
                                    </div>
                                    <form method="post" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="name" type="text" value="{{ old('name') }}" name="name" placeholder="Full Name" autofocus>
                                            @error('name')
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="phone" type="text" value="{{ old('phone') }}" name="phone" maxlength="10" placeholder="Phone Number">
                                            @error('phone')
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email" value="{{ old('email') }}" name="email" placeholder="Your Email">
                                            @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" name="password" placeholder="Password">
                                            @error('password')
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
                                            @error('password')
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" value="1">
                                                    <label class="form-check-label" for="terms"><span>I agree to terms & Policy.</span></label>
                                                    @error('terms')
                                                    <small class="text-danger">{{ $errors->first('terms') }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group btn-submit text-center">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Register</button>
                                        </div>
                                    </form>
                                    <p class="text-center mb-4">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection