@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Update Vendor Details</h2>
            <p>Hello {{ Auth::user()->name }}, You can edit your vendor details here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title mb-4">Update Vendor Details</h4>
                        <form method="post" action="{{ route('admin.vendor.update', $vendor->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-9">
                                    <div class="mb-3">
                                        <label class="form-label">Vendor Name</label>
                                        {{ html()->text($name = 'name', $value = $vendor->name)->class('form-control')->placeholder('Vendor Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        {{ html()->text($name = 'username', $value = $vendor->username)->class('form-control')->placeholder('Username')->if(($vendor->username != ''), function($q){
                                            return $q->disabled();
                                        }) }}
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        {{ html()->select($name = 'status', ['inactive'=>"Inactive", 'active'=>"Active"], $value = $vendor->status)->class('form-control select2')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        {{ html()->email($name = 'email', $value = $vendor->email)->class('form-control')->placeholder('Email') }}
                                        @error('email')
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        {{ html()->text($name = 'phone', $value = $vendor->phone)->class('form-control')->maxlength(10)->placeholder('Phone') }}
                                        @error('phone')
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        {{ html()->textarea($name = 'address', $value = (old('address')) ? old('address') : $vendor->address)->class('form-control')->placeholder('Address') }}
                                        @error('address')
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Vendor Image</label>
                                        {{ html()->file($name = 'photo', $value = NULL)->class('form-control img') }}
                                        @error('photo')
                                        <small class="text-danger">{{ $errors->first('photo') }}</small>
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
                    <div class="col-3">
                        <h4 class="card-title mb-4">Vendor Image</h4>
                        <img src="{{ (!empty($vendor->photo)) ? url($vendor->photo) : asset('/backend/assets/imgs/people/avatar1.jpg') }}" class="image" width="50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection