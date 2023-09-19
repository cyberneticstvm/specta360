@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Update Coupon</h2>
            <p>Hello {{ Auth::user()->name }}, You can update your coupon here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title mb-4">Create New Coupon</h4>
                        <form method="post" action="{{ route('admin.coupon.update', $coupon->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Coupon Name</label>
                                        {{ html()->text($name = 'name', $value = $coupon->name)->class('form-control')->maxlength(15)->placeholder('Coupon Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label">Discount %</label>
                                        {{ html()->number($name = 'discount_percentage', $value = $coupon->discount_percentage, $min='1', $max='99', $step='any')->class('form-control')->placeholder('0%') }}
                                        @error('discount_percentage')
                                        <small class="text-danger">{{ $errors->first('discount_percentage') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label">Start</label>
                                        {{ html()->date($name = 'start', $value = $coupon->start->format('Y-m-d'))->class('form-control') }}
                                        @error('start')
                                        <small class="text-danger">{{ $errors->first('start') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label">End</label>
                                        {{ html()->date($name = 'end', $value = $coupon->end->format('Y-m-d'))->class('form-control') }}
                                        @error('end')
                                        <small class="text-danger">{{ $errors->first('end') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Vendor</label>
                                        {{ html()->select($name = 'vendor_id', $data = array('0' => 'All Vendors')+getActivevendors()->pluck('name', 'id')->toArray(), $value = $coupon->vendor_id)->class('form-control select2')->placeholder('Select') }}
                                        @error('vendor_id')
                                        <small class="text-danger">{{ $errors->first('vendor_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        {{ html()->select($name = 'status', [0=>"Pending", 1=>"Active"], $value = $coupon->status)->class('form-control select2')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
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