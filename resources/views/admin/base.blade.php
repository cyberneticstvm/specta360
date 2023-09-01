<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Specta360 Admin</title>
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
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css" rel="stylesheet" type="text/css" />  
    <link href="{{ asset('/backend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="{{ route('admin.dashboard') }}" class="brand-wrap">
                <img src="{{ asset('/backend/assets/imgs/theme/logo.svg') }}" class="logo" alt="Evara Dashboard">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('admin.dashboard') }}"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu {{ (request()->segment(2) == 'brands') ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Brands</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.brands') }}">All Brands</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ (in_array(request()->segment(2), ['category', 'subcategory'])) ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Category & Subcategory</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.category') }}">All Category</a>
                        <a href="{{ route('admin.subcategory') }}">All Subcategory</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ (in_array(request()->segment(2), ['product'])) ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Product</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.product') }}">All Products</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ (in_array(request()->segment(2), ['vendors'])) ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-add_box"></i>
                        <span class="text">Vendors</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.vendors') }}">All Vendors</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ (in_array(request()->segment(2), ['slider'])) ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-add_box"></i>
                        <span class="text">Sliders</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.slider') }}">All Sliders</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ (in_array(request()->segment(2), ['banner'])) ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-add_box"></i>
                        <span class="text">Banners</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.banner') }}">All Banners</a>
                    </div>
                </li>
            </ul>
            <hr>
            <ul class="menu-aside">
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a href="page-settings-1.html">Setting sample 1</a>
                        <a href="page-settings-2.html">Setting sample 2</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-blank.html"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Starter page </span>
                    </a>
                </li>
            </ul>
            <br>
            <br>
        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img src="{{ asset('/backend/assets/imgs/theme/flag-us.png') }}" alt="English">English</a>
                            <a class="dropdown-item" href="#"><img src="{{ asset('/backend/assets/imgs/theme/flag-fr.png') }}" alt="Français">Français</a>
                            <a class="dropdown-item" href="#"><img src="{{ asset('/backend/assets/imgs/theme/flag-jp.png') }}" alt="Français">日本語</a>
                            <a class="dropdown-item" href="#"><img src="{{ asset('/backend/assets/imgs/theme/flag-cn.png') }}" alt="Français">中国人</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ (!empty(Auth::user()->photo)) ? url(Auth::user()->photo) : asset('/backend/assets/imgs/people/avatar1.jpg') }}" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><strong>Hi, {{ Auth::user()->name }}</strong></a>
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.profile.settings') }}"><i class="material-icons md-settings"></i>Account Settings</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        @yield("content")
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> ©, Specta360 .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        All rights reserved
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="{{ asset('/backend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('/backend/assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/backend/assets/js/custom-chart.js') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>    
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('/backend/assets/js/script.js') }}" type="text/javascript"></script>

    @include("message")
</body>

</html>