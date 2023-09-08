@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Update Product</h2>
            <p>Hello {{ Auth::user()->name }}, You can update your product here!</p>
            @include('message1')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <form method="post" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        {{ html()->text($name = 'name', $value = $product->name)->class('form-control')->placeholder('Product Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand Name</label>
                                        {{ html()->select($name = 'brand_id', $value = getActiveBrands()->pluck('name', 'id'), $product->brand_id)->class('form-control select2')->placeholder('Select') }}
                                        @error('brand_id')
                                        <small class="text-danger">{{ $errors->first('brand_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Vendor Name</label>
                                        {{ html()->select($name = 'vendor_id', $value = getActiveVendors()->pluck('name', 'id'), $product->vendor_id)->class('form-control select2')->placeholder('Select') }}
                                        @error('vendor_id')
                                        <small class="text-danger">{{ $errors->first('vendor_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        {{ html()->select($name = 'category_id', $value = getActiveCategories()->pluck('name', 'id'), $product->category_id)->class('form-control select2 prodCat')->placeholder('Select') }}
                                        @error('category_id')
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Subcategory Name</label>
                                        {{ html()->select($name = 'subcategory_id', $value = getActiveSubcategories()->where('category_id', $product->category_id)->pluck('name', 'id'), $product->subcategory_id)->class('form-control select2 prodSubcat')->placeholder('Select') }}
                                        @error('subcategory_id')
                                        <small class="text-danger">{{ $errors->first('subcategory_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        {{ html()->text($name = 'tags', $value = $product->tags()->pluck('name')->implode(','))->attribute('data-role', 'tagsinput')->class('form-control')->placeholder('Tags') }}
                                        @error('tags')
                                        <small class="text-danger">{{ $errors->first('tags') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Size</label>
                                        {{ html()->text($name = 'sizes', $value = $product->sizes()->pluck('name')->implode(','))->attribute('data-role', 'tagsinput')->class('form-control')->placeholder('Size') }}
                                        @error('sizes')
                                        <small class="text-danger">{{ $errors->first('sizes') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Color</label>
                                        {{ html()->text($name = 'colors', $value = $product->colors()->pluck('name')->implode(','))->attribute('data-role', 'tagsinput')->class('form-control')->placeholder('Color') }}
                                        @error('colors')
                                        <small class="text-danger">{{ $errors->first('colors') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Material</label>
                                        {{ html()->text($name = 'materials', $value = $product->materials()->pluck('name')->implode(','))->attribute('data-role', 'tagsinput')->class('form-control')->placeholder('Material') }}
                                        @error('materials')
                                        <small class="text-danger">{{ $errors->first('materials') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Style</label>
                                        {{ html()->text($name = 'styles', $value = $product->styles()->pluck('name')->implode(','))->attribute('data-role', 'tagsinput')->class('form-control')->placeholder('Style') }}
                                        @error('styles')
                                        <small class="text-danger">{{ $errors->first('styles') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        {{ html()->textarea($name = 'short_description', $value = $product->short_description)->class('form-control')->placeholder('Short Description') }}
                                        @error('short_description')
                                        <small class="text-danger">{{ $errors->first('short_description') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Product Code / SKU</label>
                                        {{ html()->text($name = 'pcode', $value = $product->pcode)->class('form-control')->maxlength(15)->placeholder('Product Code')->disabled() }}
                                        @error('qty')
                                        <small class="text-danger">{{ $errors->first('qty') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Qty</label>
                                        {{ html()->number($name = 'qty', $value = $product->qty, $min='0', $max=NULL, $step='1')->class('form-control')->placeholder('0') }}
                                        @error('qty')
                                        <small class="text-danger">{{ $errors->first('qty') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">MRP</label>
                                        {{ html()->number($name = 'mrp', $value = $product->mrp, $min='1', $max=NULL, $step='any')->class('form-control')->placeholder('0.00') }}
                                        @error('mrp')
                                        <small class="text-danger">{{ $errors->first('mrp') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>                                
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Selling Price</label>
                                        {{ html()->number($name = 'selling_price', $value = $product->selling_price, $min='0', $max=NULL, $step='any')->class('form-control')->placeholder('0.00') }}
                                        @error('selling_price')
                                        <small class="text-danger">{{ $errors->first('selling_price') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-4">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="hot_deal" value="1" {{ ($product->hot_deal == 1) ? 'checked' : '' }}>
                                        <span class="form-check-label">Hot Deal</span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="special_offer" value="1" {{ ($product->special_offer == 1) ? 'checked' : '' }}>
                                        <span class="form-check-label">Special Offer</span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="featured_product" value="1" {{ ($product->featured_product == 1) ? 'checked' : '' }}>
                                        <span class="form-check-label">Featured Product</span>
                                    </label>
                                </div>
                                <div class="col-4 mt-3">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="special_deal" value="1" {{ ($product->special_deal == 1) ? 'checked' : '' }}>
                                        <span class="form-check-label">Special Deal</span>
                                    </label>
                                </div>
                                <div class="col-4 mt-3">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="prescription" value="1" {{ ($product->prescription == 1) ? 'checked' : '' }}>
                                        <span class="form-check-label">Prescription</span>
                                    </label>
                                </div>
                                <div class="col-4 mt-3">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="status" value="1" {{ ($product->status == 1) ? 'checked' : '' }}>
                                        <span class="form-check-label">Make Active</span>
                                    </label>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Product Main Image</label>&nbsp;<small class="text-muted">(Max file size should be 500KB and 1100w x 1100h)</small>
                                        {{ html()->file($name = 'image', $value = NULL)->class('form-control main_img') }}
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                    <div id="main_img" class="text-center"><img src="{{ url($product->image) }}" width="20%" /></div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Product Images</label>&nbsp;<small class="text-muted">(Max file size should be 500KB each and 1100w x 1100h)
                                        {{ html()->file($name = 'images[]', $value = NULL)->class('form-control multi_img')->multiple() }}
                                        @error('images')
                                        <small class="text-danger">{{ $errors->first('images') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                    <div class="row">
                                        @forelse($product->images as $key => $item)
                                            <div class="col-3 imgs text-center">
                                                <img src="{{ url($item->name) }}" />
                                                <a class="mt-3 dlt" href="{{ route('admin.product.image.remove', encrypt($item->id)) }}">Remove</a>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div id="multi_img" class="text-center"></div>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-4 text-center">                                
                            <button type="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                            <button type="submit" onClick="javascript: return confirm('Are you sure want to update this Product?')" class="btn btn-submit btn-primary">Update</button>
                        </div> <!-- form-group// -->
                        <!--<div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Long Description</label>
                                {{ html()->textarea($name = 'long_description', $value = old('short_description'))->class('form-control')->attribute('id', 'txtArea')->placeholder('Long Description') }}
                                @error('long_description')
                                <small class="text-danger">{{ $errors->first('long_description') }}</small>
                                @enderror
                            </div>--> <!-- form-group// -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection