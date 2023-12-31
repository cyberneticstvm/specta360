@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New Shipping Area</h2>
            <p>Hello {{ Auth::user()->name }}, You can create your Shipping Area here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title mb-4">Create New Shipping Area</h4>
                        <form method="post" action="{{ route('admin.shiparea.save') }}">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Place Name</label>
                                        {{ html()->text($name = 'name', $value = old('name'))->class('form-control')->placeholder('Place Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label">Pincode</label>
                                        {{ html()->text($name = 'pincode', $value = old('pincode'))->class('form-control')->maxlength(6)->placeholder('Pincode') }}
                                        @error('pincode')
                                        <small class="text-danger">{{ $errors->first('pincode') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        {{ html()->select($name = 'state_id', $states, old('state_id'))->class('form-control')->placeholder('Select') }}
                                        @error('state_id')
                                        <small class="text-danger">{{ $errors->first('state_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                            {{ html()->select($name = 'city_id', $cities, old('city_id'))->class('form-control')->placeholder('Select') }}
                                        @error('city_id')
                                        <small class="text-danger">{{ $errors->first('city_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="mb-4 text-center">                                
                                <button type="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                                <button type="submit" class="btn btn-submit btn-primary">Save</button>
                            </div> <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection