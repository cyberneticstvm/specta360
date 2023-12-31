<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AjaxController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\VendorCouponController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->controller(StoreController::class)->group(function(){
    Route::get('/', 'index')->name('store.index');
    Route::get('/product/{slug}/{id}', 'productDetails')->name('product.details');
    Route::get('/category/{slug}/{id}', 'productsByCategory')->name('product.category');
    Route::get('/subcategory/{slug}/{id}', 'productsBySubcategory')->name('product.subcategory');
    Route::get('/brand/{slug}/{id}', 'productsByBrand')->name('product.brand');
    Route::get('/seller/{slug}/{id}', 'productsBySeller')->name('product.seller');
    Route::get('/seller/all', 'allSellers')->name('seller.all');
    Route::get('/productqv/details/{id}', 'productDetailsForQuickview')->name('product.details.quick.view');
    Route::get('/products/all', 'allProducts')->name('products.all');
    Route::get('/products/women', 'allWomenProducts')->name('products.women.all');
    Route::get('/products/men', 'allMenProducts')->name('products.men.all');
    Route::get('/products/kids', 'allKidsProducts')->name('products.kids.all');
    Route::get('/products/new-arrivals', 'allNewProducts')->name('products.new.all');

    Route::get('/contact', 'contact')->name('contact');
});

Route::middleware(['web'])->controller(CartController::class)->group(function(){
    Route::post('/cart/product/add', 'add')->name('cart.add');
    Route::get('/cart/product/get', 'get')->name('cart.get');
    Route::get('/cart/product/remove/{id}', 'remove')->name('cart.remove');
    Route::post('/cart/product/update/increment', 'updateIncrement')->name('cart.update.increment');
    Route::post('/cart/product/update/decrement', 'updateDecrement')->name('cart.update.decrement');
    Route::get('/cart/view', 'view')->name('cart.view');
    Route::post('/cart/apply/coupon', 'applyCoupon')->name('cart.apply.coupon');
    Route::get('/cart/coupon/remove', 'removeCoupon')->name('cart.remove.coupon');
    Route::get('/get/cart/total', 'cartTotal')->name('cart.total');
    Route::get('/cart/checkout', 'checkout')->name('cart.checkout');
});

/*Route::get('/store/dashboard', function () {
    return view('store.dashboard');
})->middleware(['auth', 'verified'])->name('store.dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/vendor/registration', [VendorController::class, 'vendorRegistration'])->name('vendor.register');
Route::post('/vendor/registration', [VendorController::class, 'registerVendor'])->name('vendor.register.save');

Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('dashboard', 'adminDashboard')->name('admin.dashboard');
    Route::get('profile', 'profile')->name('admin.profile');
    Route::put('profile/update', 'profileUpdate')->name('admin.profile.update');
    Route::put('profile/photo/update', 'profilePhotoUpdate')->name('admin.profile.photo.update');
    Route::get('profile/settings', 'profileSettings')->name('admin.profile.settings');
    Route::put('profile/settings', 'profileSettingsUpdate')->name('admin.profile.settings.update');
    Route::get('admin-settings', 'adminSettings')->name('admin.admin.settings');
    Route::put('admin-settings', 'adminSettingsUpdate')->name('admin.admin.settings.update');
    Route::get('logout', 'adminLogout')->name('admin.logout');

    Route::get('vendors', 'vendors')->name('admin.vendors');
    Route::get('vendor/edit/{id}', 'editVendor')->name('admin.vendor.edit');
    Route::put('vendor/edit/{id}', 'updateVendor')->name('admin.vendor.update');
    Route::get('vendor/cancel/{id}', 'destroyVendor')->name('admin.vendor.cancel');
});

Route::middleware(['web', 'auth', 'role:vendor'])->prefix('vendor')->controller(VendorController::class)->group(function(){
    Route::get('dashboard', 'vendorDashboard')->name('vendor.dashboard');
    Route::get('profile', 'profile')->name('vendor.profile');
    Route::put('profile/update', 'profileUpdate')->name('vendor.profile.update');
    Route::put('profile/photo/update', 'profilePhotoUpdate')->name('vendor.profile.photo.update');
    Route::get('profile/settings', 'profileSettings')->name('vendor.profile.settings');
    Route::put('profile/settings', 'profileSettingsUpdate')->name('vendor.profile.settings.update');
    Route::get('logout', 'vendorLogout')->name('vendor.logout');
});

Route::middleware(['web', 'auth', 'verified', 'role:user'])->controller(UserController::class)->group(function(){
    Route::get('dashboard', 'userDashboard')->name('user.dashboard');
    Route::put('dashboard/profile', 'profileUpdate')->name('user.profile.update');
    Route::put('dashboard/settings', 'profileSettingsUpdate')->name('user.profile.settings.update');
    Route::get('logout', 'userLogout')->name('user.logout');
});

/*Route::middleware(['web', 'auth', 'verified', 'role:user'])->controller(CartController::class)->group(function(){
    
});*/

//Brands
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(BrandController::class)->group(function(){
    Route::get('brands', 'index')->name('admin.brands');
    Route::get('brands/create', 'create')->name('admin.brands.create');
    Route::post('brands/create', 'store')->name('admin.brands.save');
    Route::get('brands/edit/{id}', 'edit')->name('admin.brands.edit');
    Route::put('brands/edit/{id}', 'update')->name('admin.brands.update');
    Route::get('brands/cancel/{id}', 'destroy')->name('admin.brands.cancel');
});

//Category
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(CategoryController::class)->group(function(){
    Route::get('category', 'index')->name('admin.category');
    Route::get('category/create', 'create')->name('admin.category.create');
    Route::post('category/create', 'store')->name('admin.category.save');
    Route::get('category/edit/{id}', 'edit')->name('admin.category.edit');
    Route::put('category/edit/{id}', 'update')->name('admin.category.update');
    Route::get('category/cancel/{id}', 'destroy')->name('admin.category.cancel');
});

//Subcategory
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(SubcategoryController::class)->group(function(){
    Route::get('subcategory', 'index')->name('admin.subcategory');
    Route::get('subcategory/create', 'create')->name('admin.subcategory.create');
    Route::post('subcategory/create', 'store')->name('admin.subcategory.save');
    Route::get('subcategory/edit/{id}', 'edit')->name('admin.subcategory.edit');
    Route::put('subcategory/edit/{id}', 'update')->name('admin.subcategory.update');
    Route::get('subcategory/cancel/{id}', 'destroy')->name('admin.subcategory.cancel');
});

//Admin Product
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(ProductController::class)->group(function(){
    Route::get('product', 'index')->name('admin.product');
    Route::get('product/create', 'create')->name('admin.product.create');
    Route::post('product/create', 'store')->name('admin.product.save');
    Route::get('product/edit/{id}', 'edit')->name('admin.product.edit');
    Route::put('product/edit/{id}', 'update')->name('admin.product.update');
    Route::get('product/cancel/{id}', 'destroy')->name('admin.product.cancel');
    Route::get('product/image/remove/{id}', 'removeImage')->name('admin.product.image.remove');
});

//Vendor Product
Route::middleware(['web', 'auth', 'role:vendor'])->prefix('vendor')->controller(VendorProductController::class)->group(function(){
    Route::get('product', 'index')->name('vendor.product');
    Route::get('product/create', 'create')->name('vendor.product.create');
    Route::post('product/create', 'store')->name('vendor.product.save');
    Route::get('product/edit/{id}', 'edit')->name('vendor.product.edit');
    Route::put('product/edit/{id}', 'update')->name('vendor.product.update');
    Route::get('product/cancel/{id}', 'destroy')->name('vendor.product.cancel');
    Route::get('product/image/remove/{id}', 'removeImage')->name('vendor.product.image.remove');
});

//Slider
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(SliderController::class)->group(function(){
    Route::get('slider', 'index')->name('admin.slider');
    Route::get('slider/create', 'create')->name('admin.slider.create');
    Route::post('slider/create', 'store')->name('admin.slider.save');
    Route::get('slider/edit/{id}', 'edit')->name('admin.slider.edit');
    Route::put('slider/edit/{id}', 'update')->name('admin.slider.update');
    Route::get('slider/cancel/{id}', 'destroy')->name('admin.slider.cancel');
});

//Banner
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(BannerController::class)->group(function(){
    Route::get('banner', 'index')->name('admin.banner');
    Route::get('banner/create', 'create')->name('admin.banner.create');
    Route::post('banner/create', 'store')->name('admin.banner.save');
    Route::get('banner/edit/{id}', 'edit')->name('admin.banner.edit');
    Route::put('banner/edit/{id}', 'update')->name('admin.banner.update');
    Route::get('banner/cancel/{id}', 'destroy')->name('admin.banner.cancel');
});

//Admin Coupon
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(CouponController::class)->group(function(){
    Route::get('coupon', 'index')->name('admin.coupon');
    Route::get('coupon/create', 'create')->name('admin.coupon.create');
    Route::post('coupon/create', 'store')->name('admin.coupon.save');
    Route::get('coupon/edit/{id}', 'edit')->name('admin.coupon.edit');
    Route::put('coupon/edit/{id}', 'update')->name('admin.coupon.update');
    Route::get('coupon/cancel/{id}', 'destroy')->name('admin.coupon.cancel');
});

//Vendor Coupon
Route::middleware(['web', 'auth', 'role:vendor'])->prefix('vendor')->controller(VendorCouponController::class)->group(function(){
    Route::get('coupon', 'index')->name('vendor.coupon');
    Route::get('coupon/create', 'create')->name('vendor.coupon.create');
    Route::post('coupon/create', 'store')->name('vendor.coupon.save');
    Route::get('coupon/edit/{id}', 'edit')->name('vendor.coupon.edit');
    Route::put('coupon/edit/{id}', 'update')->name('vendor.coupon.update');
    Route::get('coupon/cancel/{id}', 'destroy')->name('vendor.coupon.cancel');
});

//Shipping Area
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(ShippingAreaController::class)->group(function(){
    Route::get('shiparea', 'index')->name('admin.shiparea');
    Route::get('shiparea/create', 'create')->name('admin.shiparea.create');
    Route::post('shiparea/create', 'store')->name('admin.shiparea.save');
    Route::get('shiparea/undone/{id}', 'show')->name('admin.shiparea.undone');
    Route::get('shiparea/edit/{id}', 'edit')->name('admin.shiparea.edit');
    Route::put('shiparea/edit/{id}', 'update')->name('admin.shiparea.update');
    Route::get('shiparea/cancel/{id}', 'destroy')->name('admin.shiparea.cancel');
});


Route::get('/wishlist/items/get', [WishlistController::class, 'show'])->name('get.from.wishlist');
Route::get('/compare/items/get', [CompareController::class, 'comCount'])->name('get.from.compare');
Route::get('/compare/items', [CompareController::class, 'show'])->name('show.compare.items');

Route::middleware(['web', 'auth', 'role:user'])->group(function(){

    //Wishlist
    Route::controller(WishlistController::class)->group(function(){
        Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('add.to.wishlist');
        Route::get('/wishlist/item/remove/{id}', 'destroy')->name('remove.from.wishlist');
    }); 

    //Compare
    Route::controller(CompareController::class)->group(function(){
        Route::post('/compare/item/add', 'store')->name('add.to.compare');        
        Route::get('/compare/item/remove/{id}', 'destroy')->name('remove.compare.item');
    });

    //Checkout
    Route::controller(CartController::class)->group(function(){
        Route::post('/cart/place/order', 'placeOrder')->name('cart.place.order');        
    });

    //Address
    Route::controller(AddressController::class)->group(function(){
        Route::get('/user/address/{id}', 'getAddress')->name('address.get');          
        Route::post('/user/address/save', 'saveAddress')->name('address.save');          
        Route::get('/user/address/delete/{id}', 'deleteAddress')->name('address.delete');          
    });
    
});


//Ajax
Route::middleware(['web', 'auth'])->controller(AjaxController::class)->group(function(){
    Route::get('ajax/category/{id}', 'getSubcategory')->name('category.subcategory');
    Route::get('/ajax/state/{id}', 'getCities')->name('cities.get');
});
