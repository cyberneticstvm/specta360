<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $subcategories, $categories;

    public function __construct(){
        $this->subcategories = Subcategory::all();
    }

    public function index()
    {
        $subcategories = $this->subcategories;
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'max:512',
        ]);
        $input = $request->all();
        $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 1100, $height = 1100, $old_image = NULL, $path = 'store/subcategory/');
        endif;
        Subcategory::create($input);
        $notification = array(
            'message' => 'Subcategory has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.subcategory')->with($notification);
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
        $subcategory = Subcategory::findOrFail(decrypt($id));
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'max:512',
        ]);
        $input = $request->all(); $subcategory = Subcategory::findOrFail($id);
        $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 1100, $height = 1100, $old_image = $subcategory->image, $path = 'store/subcategory/');
        endif;
        $subcategory->update($input);
        $notification = array(
            'message' => 'Subcategory has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.subcategory')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subcategory::findOrFail(decrypt($id))->update(['status' => 0, 'updated_at' => Carbon::now(), 'updated_by' => Auth::user()->id]);
        $notification = array(
            'message' => 'subcategory has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.subcategory')->with($notification);
    }
}
