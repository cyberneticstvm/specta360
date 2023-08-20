<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Backend\BrandController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('store.index');
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

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login');

Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('dashboard', 'adminDashboard')->name('admin.dashboard');
    Route::get('profile', 'profile')->name('admin.profile');
    Route::put('profile/update', 'profileUpdate')->name('admin.profile.update');
    Route::put('profile/photo/update', 'profilePhotoUpdate')->name('admin.profile.photo.update');
    Route::get('profile/settings', 'profileSettings')->name('admin.profile.settings');
    Route::put('profile/settings', 'profileSettingsUpdate')->name('admin.profile.settings.update');
    Route::get('logout', 'adminLogout')->name('admin.logout');
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

//Brands
Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->controller(BrandController::class)->group(function(){
    Route::get('brands', 'index')->name('admin.brands');
    Route::get('brands/create', 'create')->name('admin.brands.create');
    Route::post('brands/create', 'store')->name('admin.brands.save');
    Route::get('brands/edit/{id}', 'edit')->name('admin.brands.edit');
    Route::put('brands/edit/{id}', 'update')->name('admin.brands.update');
    Route::get('brands/cancel/{id}', 'destroy')->name('admin.brands.cancel');
});