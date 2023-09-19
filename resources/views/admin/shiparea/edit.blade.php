@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Update Shipping Area</h2>
            <p>Hello {{ Auth::user()->name }}, You can update your Shipping Area here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title mb-4">Update Shipping Area</h4>
                        <form method="post" action="{{ route('admin.shiparea.update', $area->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Place Name</label>
                                        {{ html()->text($name = 'name', $value = $area->name)->class('form-control')->placeholder('Category Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Pincode</label>
                                        {{ html()->text($name = 'pincode', $value = $area->pincode)->class('form-control')->maxlength(6)->placeholder('Pincode') }}
                                        @error('pincode')
                                        <small class="text-danger">{{ $errors->first('pincode') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="mb-4 text-center">                                
                                <button type="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                                <button type="submit" class="btn btn-submit btn-primary">Update</button>
                            </div> <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection