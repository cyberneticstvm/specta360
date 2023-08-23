<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $brands;

    public function __construct(){
        $this->brands = Brand::all();
    }

    public function index()
    {
        $brands = $this->brands;
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands,name',
            'image' => 'max:512',
        ]);
        $input = $request->all();
        $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 300, $height = NULL, $old_image = NULL, $path = 'store/brand/');
        endif;
        Brand::create($input);
        $notification = array(
            'message' => 'Brand has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.brands')->with($notification);
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
        $brand = Brand::findOrFail(decrypt($id));
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands,name,'.$id,
            'image' => 'max:512',
        ]);
        $input = $request->all(); $brand = Brand::findOrFail($id);
        $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 300, $height = NULL, $old_image = $brand->image, $path = 'store/brand/');
        endif;
        $brand->update($input);
        $notification = array(
            'message' => 'Brand has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.brands')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::findOrFail(decrypt($id))->update(['status' => 0, 'updated_at' => Carbon::now(), 'updated_by' => Auth::user()->id]);
        $notification = array(
            'message' => 'Brand has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.brands')->with($notification);
    }
}
