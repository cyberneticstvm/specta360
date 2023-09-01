<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $sliders;

    public function __construct(){
        $this->sliders = Slider::all();
    }

    public function index()
    {
        $sliders = $this->sliders;
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'short_title' => 'required',
            'bottom_title' => 'required',
            'short_description' => 'required',
            'image' => 'required|max:512|mimes:jpg,jpeg,png,webp',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 700, $height = 620, $old_image = NULL, $path = 'store/slider/');
        endif;
        Slider::create($input);
        $notification = array(
            'message' => 'Slider has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.slider')->with($notification);
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
        $slider = Slider::findOrFail(decrypt($id));
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'short_title' => 'required',
            'bottom_title' => 'required',
            'short_description' => 'required',
            'status' => 'required',
            'order' => 'required',
            'image' => 'max:512|mimes:jpg,jpeg,png,webp',
        ]);
        $input = $request->all();
        $input['updated_by'] = $request->user()->id;
        $slider = Slider::findOrFail($id);
        if($request->file('image')):
            $input['image'] = uploadImage($new_image = $request->file('image'), $width = 700, $height = 620, $old_image = $slider->image, $path = 'store/slider/');
        endif;
        $slider->update($input);
        $notification = array(
            'message' => 'Slider has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.slider')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::findOrFail(decrypt($id))->update(['status' => 0, 'updated_at' => Carbon::now(), 'updated_by' => Auth::user()->id]);
        $notification = array(
            'message' => 'Slider has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.slider')->with($notification);
    }
}
