<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ShippingArea;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = ShippingArea::withTrashed()->orderBy('name', 'ASC')->get();
        return view('admin.shiparea.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        return view('admin.shiparea.create', compact('cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'pincode' => 'required|numeric|digits:6|unique:shipping_areas,pincode',
            'city_id' => 'required',
            'state_id' => 'required',
        ]);
        ShippingArea::insert([
            'name' => $request->name,
            'pincode' => $request->pincode,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Shipping Area has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shiparea')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        ShippingArea::onlyTrashed()->where('id', decrypt($id))->restore();
        $notification = array(
            'message' => 'Shipping Area has been retained successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shiparea')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = State::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $area = ShippingArea::findOrFail(decrypt($id));
        return view('admin.shiparea.edit', compact('area', 'cities', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'pincode' => 'required|numeric|digits:6|unique:shipping_areas,pincode,'.$id,
            'city_id' => 'required',
            'state_id' => 'required',
        ]);
        ShippingArea::findOrFail($id)->update([
            'name' => $request->name,
            'pincode' => $request->pincode,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'updated_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Shipping Area has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shiparea')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ShippingArea::findOrFail(decrypt($id))->delete();
        $notification = array(
            'message' => 'Shipping Area has been deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shiparea')->with($notification);
    }
}
