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
                                    <div class="heading_s1 mb-3">
                                        <h3 class="mb-30">Forgot Password</h3>
                                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                    </div>
                                    <form method="post" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" value="{{ old('email') }}" name="email" placeholder="Your Email" autofocus>
                                            @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group btn-submit text-center">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Email Password Reset Link</button>
                                        </div>
                                    </form>
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