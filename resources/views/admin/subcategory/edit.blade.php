@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New subcategory</h2>
            <p>Hello {{ Auth::user()->name }}, You can edit your subcategory here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title mb-4">Create New Subcategory</h4>
                        <form method="post" action="{{ route('admin.subcategory.update', $subcategory->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-9">
                                    <div class="mb-3">
                                        <label class="form-label">Subcategory Name</label>
                                        {{ html()->text($name = 'name', $value = $subcategory->name)->class('form-control')->placeholder('Subcategory Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        {{ html()->select($name = 'status', [0=>"Cancelled", 1=>"Active"], $value = $subcategory->status)->class('form-control select2')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        {{ html()->select($name = 'category_id', $data = getActiveCategories()->pluck('name', 'id'), $value = $subcategory->category_id)->class('form-control select2')->placeholder('Select') }}
                                        @error('category_id')
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Subcategory Image</label>
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
                        <h4 class="card-title mb-4">Subcategory Image</h4>
                        <img src="{{ asset('/backend/assets/imgs/people/avatar1.jpg') }}" class="image" width="50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection