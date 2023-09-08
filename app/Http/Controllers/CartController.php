<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use Exception;

class CartController extends Controller
{
    public function add(Request $request, $id){
        $product = Product::findOrFail($id);
        try{
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->image, 'size' => '', 'color' => '']
            ]);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }        
        return response()->json(['success' => 'Product added successfully in your cart!']);
    }
}
