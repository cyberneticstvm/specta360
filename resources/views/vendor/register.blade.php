<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Specta360 Vendor Registration</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/backend/assets/imgs/theme/favicon.svg') }}">
    <!-- Template CSS -->
    <link href="{{ asset('/backend/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <main>
        <section class="content-main mt-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Vendor Registration</h4>
                    <form method="POST" action="{{ route('vendor.register.save') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-1">Shop Name</label>
                            <input class="form-control" id="name" name="name" placeholder="Shop Name" type="text" value="{{ old('name') }}">
                            @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="mb-1">Phone Number</label>
                            <input class="form-control" id="phone" name="phone" placeholder="Phone Number" type="text" value="{{ old('phone') }}" maxlength="10">
                            @error('phone')
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="mb-1">Email</label>
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" value="{{ old('email') }}">
                            @error('email')
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="mb-1">Password</label>
                            <input class="form-control" name="password" placeholder="******" type="password">
                            @error('password')
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="mb-1">Confirm Password</label>
                            <input class="form-control" name="password_confirmation" placeholder="******" type="password">
                            @error('password_confirmation')
                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="form-check">
                                <input type="checkbox" id="terms" name="terms" value="1" class="form-check-input">
                                <span class="form-check-label">Agree terms & conditions</span>
                            </label>
                            @error('terms')
                            <small class="text-danger">{{ $errors->first('terms') }}</small>
                            @enderror
                        </div> <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-submit btn-primary w-100"> Register </button>
                        </div> <!-- form-group// -->
                    </form>
                    <p class="text-center small text-muted">or sign up with</p>
                    <p class="text-center mb-4">Already have an account? <a href="{{ route('vendor.login') }}">Login</a></p>
                    @include("message1")
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('/backend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('/backend/assets/js/main.js" type="text/javascript') }}"></script>
    <script>
        $(function(){
            $('form').submit(function(){
                $(".btn-submit").attr("disabled", true);
                $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
            });
        });
        setTimeout(function () {
            $(".alert").hide('slow');
        }, 5000);
    </script>
</body>

</html>