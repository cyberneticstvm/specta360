<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductTag;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use DB;

class StoreController extends Controller
{
    public function index(){
        return view('store.index');
    }

    public function productDetails($slug, $id){
        $product = Product::findOrFail($id);
        return view('store.product-details', compact('product'));
    }

    public function productsByCategory($slug, $id){
        $products = Product::where('category_id', $id)->latest()->paginate(12);
        return view('store.product-by-category', compact('products'));
    }

    public function productsBySubcategory($slug, $id){
        $products = Product::where('subcategory_id', $id)->latest()->paginate(12);
        return view('store.product-by-subcategory', compact('products'));
    }

    public function productsByBrand($slug, $id){
        $products = Product::where('brand_id', $id)->latest()->paginate(12);
        return view('store.product-by-brand', compact('products'));
    }

    public function productsByVendor($slug, $id){
        $products = Product::where('vendor_id', $id)->latest()->paginate(12);
        return view('store.product-by-vendor', compact('products'));
    }

    public function allVendors(){
        $vendors = User::where('status', 'active')->where('role', 'vendor')->latest()->paginate(10);
        return view('store.vendors', compact('vendors'));
    }

    public function productDetailsForQuickview($id){
        $product = Product::with('vendor', 'brand', 'category', 'subcategory')->findOrFail($id);
        $tags = ProductTag::where('product_id', $product->id)->pluck('name')->implode(', ');
        $colors = ProductColor::where('product_id', $product->id)->pluck('name');
        $sizes = ProductSize::where('product_id', $product->id)->pluck('name');
        return response()->json(['product' => $product, 'tags' => $tags, 'colors' => $colors, 'sizes' => $sizes]);
    }
}
