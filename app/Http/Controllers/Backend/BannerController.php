<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $banners;

    public function __construct(){
        $this->banners = Banner::all();
    }

    public function index()
    {
        $banners = $this->banners;
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|unique:banners,label',
            'title' => 'required|unique:banners,title',            
            'image' => 'required|max:512|mimes:jpg,jpeg,png,webp',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        $input['slug'] = strtolower(str_replace(' ', '-', $request->title));
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 600, $height = 255, $old_image = NULL, $path = 'store/banner/');
        endif;
        Banner::create($input);
        $notification = array(
            'message' => 'Banner has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.banner')->with($notification);
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
        $banner = Banner::findOrFail(decrypt($id));
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'label' => 'required|unique:banners,label,'.$id,
            'title' => 'required|unique:banners,title,'.$id,            
        ]);
        $input = $request->all();
        $input['updated_by'] = $request->user()->id;
        $input['slug'] = strtolower(str_replace(' ', '-', $request->title));
        $banner = Banner::findOrFail($id);
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 600, $height = 255, $old_image = $banner->image, $path = 'store/banner/');
        endif;
        $banner->update($input);
        $notification = array(
            'message' => 'Banner has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.banner')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Banner::findOrFail(decrypt($id))->update(['status' => 0, 'updated_at' => Carbon::now(), 'updated_by' => Auth::user()->id]);
        $notification = array(
            'message' => 'Banner has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.banner')->with($notification);
    }
}
