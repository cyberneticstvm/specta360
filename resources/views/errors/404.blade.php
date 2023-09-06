<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>404 Error</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/assets/imgs/theme/favicon.svg') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/main.css?v=3.4') }}">
</head>

<body>
    <main class="main page-404">
        <div class="container">
            <div class="row align-items-center height-100vh text-center">
                <div class="col-lg-8 m-auto">
                    <p class="mb-50"><img src="{{ asset('/frontend/assets/imgs/theme/404.png') }}" alt="" class="hover-up"></p>
                    <h2 class="mb-30">Page Not Found</h2>
                    <p class="font-lg text-grey-700 mb-30">
                    @auth
                    <p class="">Hello {{ Auth::user()->name }}, Requested resource couldn't found!</p>
                    @else
                    <p class="">Hello Guest, Requested resource couldn't found!</p>
                    @endauth
                    </p>
                    <h5 class="text-danger m-3">{{ $exception->getMessage() }}</h5>
                    <form class="contact-form-style text-center" id="contact-form" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="input-style mb-20 hover-up">
                                    <input name="name" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-default submit-auto-width font-xs hover-up" href="javascript:void(0)" onclick="window.history.back()">Back To Previous Page</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-5">Error 404</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('/frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('/frontend/assets/js/main.js?v=3.4') }}"></script>
</body>

</html>
