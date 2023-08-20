<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Specta360 Admin Login</title>
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
                    <h4 class="card-title mb-4">Admin Sign in</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" value="{{ old('email') }}">
                            @error('email')
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <input class="form-control" name="password" placeholder="Password" type="password">
                            @error('password')
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <label class="form-check">
                                <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                <span class="form-check-label">Remember</span>
                            </label>
                        </div> <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-submit btn-primary w-100"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                    <p class="text-center small text-muted">or sign up with</p>
                    <p class="text-center mb-4">Don't have account? <a href="#">Sign up</a></p>
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