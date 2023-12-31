<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductMaterial;
use App\Models\ProductSize;
use App\Models\ProductStyle;
use App\Models\ProductTag;
use App\Models\State;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use DB;
use Cart;

class StoreController extends Controller
{
    public function index(){
        $title = settings()->meta_title;
        return view('store.index', compact('title'));
    }

    public function productDetails($slug, $id){
        $product = Product::findOrFail($id);
        $title = settings()->company_name.' | '.$product->name;
        return view('store.pages.product-details', compact('product', 'title'));
    }

    public function productsByCategory($slug, $id){
        $title = "";
        $products = Product::where('category_id', $id)->latest()->paginate(12);
        return view('store.pages.product-by-category', compact('products', 'title'));
    }

    public function productsBySubcategory($slug, $id){
        $title = "";
        $products = Product::where('subcategory_id', $id)->latest()->paginate(12);
        return view('store.pages.product-by-subcategory', compact('products', 'title'));
    }

    public function productsByBrand($slug, $id){
        $title = "";
        $products = Product::where('brand_id', $id)->latest()->paginate(12);
        return view('store.pages.product-by-brand', compact('products', 'title'));
    }

    public function productsBySeller($slug, $id){
        $title = "";
        $products = Product::where('vendor_id', $id)->latest()->paginate(12);
        return view('store.pages.product-by-vendor', compact('products', 'title'));
    }

    public function allSellers(){
        $title = "";
        $vendors = User::where('status', 'active')->where('role', 'vendor')->latest()->paginate(10);
        return view('store.pages.vendors', compact('vendors', 'title'));
    }

    public function productDetailsForQuickview($id){
        $product = Product::with('vendor', 'brand', 'category', 'subcategory')->findOrFail($id);
        $tags = ProductTag::where('product_id', $product->id)->pluck('name')->implode(', ');
        $colors = ProductColor::where('product_id', $product->id)->pluck('name');
        $sizes = ProductSize::where('product_id', $product->id)->pluck('name');
        $styles = ProductStyle::where('product_id', $product->id)->pluck('name');
        $materials = ProductMaterial::where('product_id', $product->id)->pluck('name');
        $currency = settings()->currency_symbol;
        return response()->json(['product' => $product, 'tags' => $tags, 'colors' => $colors, 'sizes' => $sizes, 'styles' => $styles, 'materials' => $materials, 'currency' => $currency]);
    }

    public function allProducts(){
        $title = "";
        $products = Product::latest()->paginate(12);
        return view('store.pages.products-all', compact('products', 'title'));
    }

    public function allNewProducts(){
        $title = "";
        $products = Product::latest()->paginate(12);
        return view('store.pages.new-arrivals', compact('products', 'title'));
    }

    public function allKidsProducts(){
        $title = "";
        $products = Product::latest()->paginate(12);
        return view('store.pages.product-by-kids', compact('products', 'title'));
    }

    public function allMenProducts(){
        $title = "";
        $products = Product::latest()->paginate(12);
        return view('store.pages.product-by-men', compact('products', 'title'));
    }

    public function allWomenProducts(){
        $title = "";
        $products = Product::latest()->paginate(12);
        return view('store.pages.product-by-women', compact('products', 'title'));
    }

    public function contact(){
        $title = "";
        return view('store.pages.contact');
    }
}
