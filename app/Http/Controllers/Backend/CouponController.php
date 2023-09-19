<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'discount_percentage' => 'required',
            'start' => 'required',
            'end' => 'required',
            'vendor_id' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Coupon::create($input);
        $notification = array(
            'message' => 'Coupon has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.coupon')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail(decrypt($id));
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'discount_percentage' => 'required',
            'start' => 'required',
            'end' => 'required',
            'vendor_id' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['updated_by'] = $request->user()->id;
        $coupon = Coupon::findOrFail($id);
        $coupon->update($input);
        $notification = array(
            'message' => 'Coupon has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.coupon')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::findOrFail(decrypt($id))->delete();
        $notification = array(
            'message' => 'Coupon has been deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.coupon')->with($notification);
    }
}
