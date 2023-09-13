<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'product_id' => 'required',
        ]);
        try{
            $product = Product::findOrFail($request->product_id);
            if(Auth::check()):
                Compare::insert([
                    'product_id' => $product->id,
                    'user_id' => $request->user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            else:
                return response()->json(['error' => 'User should be logged in to add product to the compare list!']);
            endif;
        }catch(Exception $e){
            return response()->json(['error' => "Requested product has already added in your compare list!"]);
        }
        return response()->json(['success' => 'Product added successfully in your compare list!']);
    }

    public function show()
    {
        $data = Compare::where('user_id', Auth::id())->get();
        return view('store.product-compare', compact('data'));
    }

    public function comCount(){
        $comcount = Compare::where('user_id', Auth::id())->count();
        return response()->json(array(
            'comcount' => $comcount,
        ));
    }

    public function destroy(string $id)
    {
        Compare::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->withSuccess("Item successfully removed from your comparison list!");
    }
}
