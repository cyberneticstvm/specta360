<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductMaterial;
use App\Models\ProductSize;
use App\Models\ProductStyle;
use App\Models\ProductTag;
use Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $products;

    public function __construct(){
        $this->products = Product::orderByDesc('id')->get();
    }

    public function index()
    {
        $products = $this->products;
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'brand_id' => 'required',
            'vendor_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'tags' => 'required',
            'sizes' => 'required',
            'colors' => 'required',
            'materials' => 'required',
            'styles' => 'required',
            'short_description' => 'required',
            'pcode' => 'required|unique:products,pcode',
            'qty' => 'required',
            'mrp' => 'required',
            'selling_price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:512',
            'images' => 'required',
        ]);
        $input = $request->except(array('tags', 'sizes', 'colors', 'materials', 'styles', 'images'));
        try{
            $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
            $input['created_by'] = $request->user()->id;
            $input['updated_by'] = $request->user()->id;
            $product = Product::create($input);
            if($request->file('image')):
                $main_img = uploadImage($new_image = $request->file('image'), $width = 1100, $height = 1100, $old_image = NULL, $path = 'store/product/'.$product->id.'/');
                Product::whereId($product->id)->update(['image' => $main_img]);
            endif;

            $images = $request->file('images');
            foreach($images as $key => $item):
                $img = uploadImage($new_image = $item, $width = 800, $height = 800, $old_image = NULL, $path = 'store/product/'.$product->id.'/');
                ProductImage::insert([
                    'product_id' => $product->id,
                    'name' => $img,
                ]);
            endforeach;

            $tag = explode (",", $request->tags);
            $size = explode (",", $request->sizes);
            $color = explode (",", $request->colors);
            $material = explode (",", $request->materials);
            $style = explode (",", $request->styles);

            foreach($tag as $key => $item):
                $tags [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($size as $key => $item):
                $sizes [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($color as $key => $item):
                $colors [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($material as $key => $item):
                $materials [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($style as $key => $item):
                $styles [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            ProductTag::insert($tags);
            ProductSize::insert($sizes);
            ProductColor::insert($colors);
            ProductMaterial::insert($materials);
            ProductStyle::insert($styles);
            
        }catch(Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification)->withInput($request->all());
        }
        $notification = array(
            'message' => 'Product has been created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.product')->with($notification);
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
        $product = Product::findOrFail(decrypt($id));
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name,'.$id,
            'brand_id' => 'required',
            'vendor_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'tags' => 'required',
            'sizes' => 'required',
            'colors' => 'required',
            'materials' => 'required',
            'styles' => 'required',
            'short_description' => 'required',
            'qty' => 'required',
            'mrp' => 'required',
            'selling_price' => 'required',
            'image' => 'mimes:jpg,jpeg,png,webp|max:512',
        ]);
        $input = $request->except(array('tags', 'sizes', 'colors', 'materials', 'styles', 'images', 'pcode'));
        try{
            $input['slug'] = strtolower(str_replace(' ', '-', $request->name));
            $input['updated_by'] = $request->user()->id;
            $input['status'] = ($request->status && $request->status == 1) ? 1 : 0;
            $product = Product::findOrFail($id);
            if($request->file('image')):
                $main_img = uploadImage($new_image = $request->file('image'), $width = 1100, $height = 100, $old_image = $product->image, $path = 'store/product/'.$product->id.'/');
                $input['image'] = $main_img;
            endif;
            if($request->file('images')):
                $images = $request->file('images');
                foreach($images as $key => $item):
                    $img = uploadImage($new_image = $item, $width = 800, $height = 800, $old_image = NULL, $path = 'store/product/'.$product->id.'/');
                    ProductImage::insert([
                        'product_id' => $product->id,
                        'name' => $img,
                    ]);
                endforeach;
            endif;
            $tag = explode (",", $request->tags);
            $size = explode (",", $request->sizes);
            $color = explode (",", $request->colors);
            $material = explode (",", $request->materials);
            $style = explode (",", $request->styles);
            foreach($tag as $key => $item):
                $tags [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($size as $key => $item):
                $sizes [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($color as $key => $item):
                $colors [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($material as $key => $item):
                $materials [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            foreach($style as $key => $item):
                $styles [] = [
                    'product_id' => $product->id,
                    'name' => $item,
                ];
            endforeach;
            $product->update($input);
            ProductTag::where('product_id', $id)->delete();
            ProductSize::where('product_id', $id)->delete();
            ProductColor::where('product_id', $id)->delete();
            ProductMaterial::where('product_id', $id)->delete();
            ProductStyle::where('product_id', $id)->delete();
            ProductTag::insert($tags);
            ProductSize::insert($sizes);
            ProductColor::insert($colors);
            ProductMaterial::insert($materials);
            ProductStyle::insert($styles);
            
        }catch(Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification)->withInput($request->all());
        }
        $notification = array(
            'message' => 'Product has been updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.product')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail(decrypt($id))->update(['status' => 0, 'updated_at' => Carbon::now(), 'updated_by' => Auth::user()->id]);
        $notification = array(
            'message' => 'Product has been cancelled successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.product')->with($notification);
    }

    public function removeImage($id){
        $image = ProductImage::findOrFail(decrypt($id));
        $path = 'store/product/'.$image->product_id.'/';
        if(Storage::disk('s3')->exists($path.substr($image->name, strrpos($image->name, '/')+1))):
            Storage::disk('s3')->delete($path.substr($image->name, strrpos($image->name, '/')+1));
        endif;
        ProductImage::findOrFail(decrypt($id))->delete();
        $notification = array(
            'message' => 'Product image has been removed successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.product.edit', encrypt($image->product_id))->with($notification);
    }
}
