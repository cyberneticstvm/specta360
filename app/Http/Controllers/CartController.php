<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Cart;
use Exception;

class CartController extends Controller
{
    public function add(Request $request){
        $validate = $this->validate($request, [
            'product_id' => 'required',
            'color' => 'required',
            'size' => 'required',
            'qty' => 'required',
        ]);
        $product = Product::findOrFail($request->product_id);
        try{
            $prescription = "";
            if($request->file('prescription')):
                $path = Storage::disk('s3')->put('store/order/prescription', $request->prescription);
                $prescription = Storage::disk('s3')->url($path);
            endif;
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->image, 'slug'=> $product->slug, 'size' => $request->size, 'color' => $request->color, 'prescription' => $prescription, 're_sph' => $request->re_sph, 're_cyl' => $request->re_cyl, 're_axis' => $request->re_axis, 're_add' => $request->re_add, 'le_sph' => $request->le_sph, 'le_cyl' => $request->le_cyl, 'le_axis' => $request->le_axis, 'le_add' => $request->le_add]
            ]);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }        
        return response()->json(['success' => 'Product added successfully in your cart!']);
    }

    public function get(){
        $cart = Cart::content(); $cart_qty = Cart::count(); $cart_total = Cart::total();
        return response()->json(array(
            'cart' => $cart,
            'cart_qty' => $cart_qty,
            'cart_total' => $cart_total
        ));
    }

    public function remove($id){
        $cart = Cart::get($id);
        if(Storage::disk('s3')->exists('store/order/prescription/'.substr($cart->options->prescription, strrpos($cart->options->prescription, '/')+1))):
            Storage::disk('s3')->delete('store/order/prescription/'.substr($cart->options->prescription, strrpos($cart->options->prescription, '/')+1));
        endif;
        Cart::remove($id);
        return response()->json(['success' => 'Product successfully removed from your cart!']);
    }

    public function view(){
        
    }

    public function checkout(){
        
    }

    
}
