<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $categories;

    public function __construct(){
        $this->categories = Category::all();
    }

    public function index()
    {
        $categories = $this->categories;
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'image' => 'max:512',
        ]);
        $input = $request->all();
        $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 120, $height = NULL, $old_image = NULL, $path = 'store/category/');
        endif;
        Category::create($input);
        $notification = array(
            'message' => 'Category has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.category')->with($notification);
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
        $category = Category::findOrFail(decrypt($id));
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
            'image' => 'max:512',
        ]);
        $input = $request->all(); $category = Category::findOrFail($id);
        $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 120, $height = NULL, $old_image = $category->image, $path = 'store/category/');
        endif;
        $category->update($input);
        $notification = array(
            'message' => 'Category has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail(decrypt($id))->update(['status' => 0, 'updated_at' => Carbon::now(), 'updated_by' => Auth::user()->id]);
        $notification = array(
            'message' => 'Category has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.category')->with($notification);
    }
}
