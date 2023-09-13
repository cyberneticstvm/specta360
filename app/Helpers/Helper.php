<?php

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


function uploadImage($new_image, $width, $height, $old_image, $path){
    if(Storage::disk('s3')->exists($path.substr($old_image, strrpos($old_image, '/')+1))):
        Storage::disk('s3')->delete($path.substr($old_image, strrpos($old_image, '/')+1));
    endif;
    $filename = $path.$new_image->hashName();
    $image = Image::make($new_image->getRealPath())->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $path = Storage::disk('s3')->put($filename, $image->stream()->__toString(), 'public');
    $path = Storage::disk('s3')->url($filename);   
    return $path;
}

function getActiveCategories(){
    return Category::where('status', 1)->orderBy('name', 'ASC')->get();
}

function getActiveSubcategories(){
    return Subcategory::where('status', 1)->orderBy('name', 'ASC')->get();
}

function getActiveBrands(){
    return Brand::where('status', 1)->orderBy('name', 'ASC')->get();
}

function getActivevendors(){
    return User::where('role', 'vendor')->where('status', 'active')->get();
}

function getActiveProducts(){
    return Product::where('status', 1)->latest()->get();
}

function getAllvendors(){
    return User::where('role', 'vendor')->orderByDesc('status')->get();
}

function getActiveSliders(){
    return Slider::where('status', 1)->orderBy('order', 'ASC')->get();
}

function getActiveBanners(){
    return Banner::where('status', 1)->orderBy('order', 'ASC')->get();
}

function getActiveProductsByTag($tags){
    return ProductTag::whereIn('name', $tags)->orderByDesc('id')->get();
}

function getWishListedItems(){
    return Wishlist::where('user_id', Auth::id())->latest()->get();
}

?>