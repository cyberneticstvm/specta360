<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAddress($id){
        $address = Address::findOrFail($id);
        return response()->json(array(
            'address' => $address,
        ));        
    }

    public function saveAddress(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'house_name' => 'required',
            'area' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'landmark' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'mobile' => 'required|numeric|digits:10',
            'type' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::id();
        if($request->id > 0):
            Address::findOrFail($request->id)->update($input);
        else:
            Address::create($input);
        endif;
        return response()->json(array(
            'success' => 'Address updated successfully!',
        ));
    }

    public function deleteAddress($id){
        Address::findOrFail(decrypt($id))->delete();
        return back()->with("success", "Address deleted successfully!");
    }
}
