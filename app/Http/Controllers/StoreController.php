<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        return view('store.index');
    }

    public function productDetails($slug, $id){
        $product = Product::findOrFail($id);
        return view('store.product-details', compact('product'));
    }
}
