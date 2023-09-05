@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New Sucategory</h2>
            <p>Hello {{ Auth::user()->name }}, You can create your subcategory here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title mb-4">Create New Subcategory</h4>
                        <form method="post" action="{{ route('admin.subcategory.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Subcategory Name</label>
                                        {{ html()->text($name = 'name', $value = old('name'))->class('form-control')->placeholder('Subcategory Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        {{ html()->select($name = 'category_id', $data = getActiveCategories()->pluck('name', 'id'), $value = old('category_id'))->class('form-control select2')->placeholder('Select') }}
                                        @error('category_id')
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Category Image</label>&nbsp;<small class="text-muted">(Max file size should be 500KB and 1100w and 1100h)</small>
                                        {{ html()->file($name = 'image', $value = NULL)->class('form-control img') }}
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="mb-4 text-center">                                
                                <button type="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                                <button type="submit" class="btn btn-submit btn-primary">Save</button>
                            </div> <!-- form-group// -->
                        </form>
                    </div>
                    <div class="col-3">
                        <h4 class="card-title mb-4">Category Image</h4>
                        <img src="{{ asset('/backend/assets/imgs/people/avatar1.jpg') }}" class="image" width="50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection