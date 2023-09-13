<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
        ]);
        try{
            $product = Product::findOrFail($request->product_id);
            if(Auth::check()):
                Wishlist::insert([
                    'product_id' => $product->id,
                    'user_id' => $request->user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            else:
                return response()->json(['error' => 'User should be logged in to add product to the wishlist!']);
            endif;
        }catch(Exception $e){
            return response()->json(['error' => "Requested product has already added in your wishlist!"]);
        }
        return response()->json(['success' => 'Product added successfully in your wishlist!']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $wlcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(array(
            'wlcount' => $wlcount,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
        return response()->json(['success' => 'Product successfully deleted from your wishlist!']);
    }
}
