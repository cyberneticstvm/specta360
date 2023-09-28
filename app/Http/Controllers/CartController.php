<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationEmail;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                'taxRate' => 0,
                'options' => ['vendor' => $product->vendor_id, 'image' => $product->image, 'slug'=> $product->slug, 'size' => $request->size, 'color' => $request->color, 'prescription' => $prescription, 're_sph' => $request->re_sph, 're_cyl' => $request->re_cyl, 're_axis' => $request->re_axis, 're_add' => $request->re_add, 'le_sph' => $request->le_sph, 'le_cyl' => $request->le_cyl, 'le_axis' => $request->le_axis, 'le_add' => $request->le_add, 'currency' => settings()->currency_symbol]
            ]);
            if(Session::has('coupon')) Session::forget('coupon');
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
            'cart_total' => $cart_total,
            'currency' => settings()->currency_symbol,
        ));
    }

    public function remove($id){
        $cart = Cart::get($id);
        if(Storage::disk('s3')->exists('store/order/prescription/'.substr($cart->options->prescription, strrpos($cart->options->prescription, '/')+1))):
            Storage::disk('s3')->delete('store/order/prescription/'.substr($cart->options->prescription, strrpos($cart->options->prescription, '/')+1));
        endif;
        Cart::remove($id);
        if(Session::has('coupon')):
            $arr = $this->calculate(session()->get('coupon')['coupon_name']);
            $this->setSession($arr['disc'], session()->get('coupon')['coupon_name']);
        endif;
        return response()->json(['success' => 'Product successfully removed from your cart!']);
    }

    public function view(){
        $cart = Cart::content(); $cart_qty = Cart::count(); $cart_total = Cart::total();
        return view('store.pages.cart', compact('cart', 'cart_qty', 'cart_total'));
    }

    public function updateIncrement(Request $request){
        $cart = Cart::get($request->id);
        Cart::update($request->id, $cart->qty + 1);
        if(Session::has('coupon')):
            $arr = $this->calculate(session()->get('coupon')['coupon_name']);
            $this->setSession($arr['disc'], session()->get('coupon')['coupon_name']);
        endif;
        return response()->json(array(
            'success' => 'Cart Qty updated successfully!',
        ));
    }

    public function updateDecrement(Request $request){
        $cart = Cart::get($request->id);
        Cart::update($request->id, $cart->qty - 1);
        if(Session::has('coupon')):
            $arr = $this->calculate(session()->get('coupon')['coupon_name']);
            $this->setSession($arr['disc'], session()->get('coupon')['coupon_name']);
        endif;
        return response()->json(array(
            'success' => 'Cart Qty updated successfully!',
        ));
    }

    public function applyCoupon(Request $request){
        $this->validate($request, [
            'coupon' => 'required',
        ]);
        $arr = $this->calculate($request->coupon);
        if($arr['tot'] > 0 && $arr['disc'] > 0):
            if(Session::has('coupon')):
                return response()->json(array(
                    'error' => "Coupon has already been applied!",
                ));
            else:
                $this->setSession($arr['disc'], $request->coupon);
                return response()->json(array(
                    'success' => "Coupon has been applied successfully!",
                ));
            endif;
        else:
            return response()->json(array(
                'error' => "Invalid Coupon!",
            ));
        endif;
    }

    function calculate($cname){
        $cart = Cart::content(); $coupon = collect(); $tot = 0; $disc = 0;
        foreach($cart as $key => $item):
            $coupon = Coupon::where('name', $cname)->whereDate('end', '>=', Carbon::today())->whereIn('vendor_id', [$item->options->vendor, 0])->where('status', 1)->first();
            if(!empty($coupon)):
                $tot += $item->price; $disc = $coupon->discount_percentage;
            endif;
        endforeach;
        return array('tot' => $tot, 'disc' => $disc);
    }

    function setSession($disc, $cname){
        Session::put('coupon', [
            'coupon_name' => $cname,
            'disc_per' => $disc,
            'disc_amount' => round((Cart::total() * $disc)/100),
            'total' => round(Cart::total() - ((Cart::total() * $disc))/100),
        ]);
    }

    public function removeCoupon(){
        Session::forget('coupon');
        return response()->json(array(
            'success' => "Coupon has been removed successfully!",
        ));
    }

    public function cartTotal(){
        if(Session::has('coupon')):
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'disc_per' => session()->get('coupon')['disc_per'],
                'disc_amount' => session()->get('coupon')['disc_amount'],
                'total' => session()->get('coupon')['total'],
                'currency' => settings()->currency_symbol,
            ));
        else:
            return response()->json(array(
                'subtotal' => Cart::total(),
                'total' => Cart::total(),
                'currency' => settings()->currency_symbol,
            ));
        endif;
    }

    public function checkout(){
        if(Auth::check()):
            if(Cart::total() > 0):
                $cart = Cart::content();
                $qty = Cart::count();
                $total = Cart::total();
                return view('store.pages.checkout', compact('cart', 'qty', 'total'));
            else:
                return redirect()->back()->withError("Your cart is empty!");
            endif;
        else:
            return redirect()->route('login')->withError("User should be logged in to perform the checkout!");
        endif;
    }

    public function placeOrder(Request $request){
        $data = [
            'order_no' => '12311432423432',
            'amount' => 250.00,
            'name' => $request->user()->name,
        ];
        Mail::to($request->user()->email)->send(new OrderConfirmationEmail($data));
        return redirect()->route('store.index')->withSuccess("Order has been placed successfully!");
    }
    
}
