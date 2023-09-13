@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Administrative Settings</h2>
            <p>Hello {{ Auth::user()->name }}, You can edit your settings here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <h4 class="card-title mb-4">Administrative Settings</h4>
                    <form method="post" action="{{ route('admin.admin.settings.update') }}">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Name</label>
                                    {{ html()->text($name = 'company_name', ($settings) ? $settings->company_name : old('company_name'))->class('form-control')->placeholder('Company Name') }}
                                    @error('company_name')
                                    <small class="text-danger">{{ $errors->first('company_name') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    {{ html()->text($name = 'meta_title', ($settings) ? $settings->meta_title : old('meta_title'))->class('form-control')->placeholder('Meta Title') }}
                                    @error('meta_title')
                                    <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Country Name</label>
                                    {{ html()->text($name = 'country_name', ($settings) ? $settings->country_name : old('country_name'))->class('form-control')->placeholder('Country Name') }}
                                    @error('country_name')
                                    <small class="text-danger">{{ $errors->first('country_name') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Country Code</label>
                                    {{ html()->text($name = 'country_code', ($settings) ? $settings->country_code : old('country_code'))->class('form-control')->maxlength(5)->placeholder('Country Code') }}
                                    @error('country_code')
                                    <small class="text-danger">{{ $errors->first('country_code') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Flag</label>
                                    {{ html()->text($name = 'flag', ($settings) ? $settings->flag : old('flag'))->class('form-control')->placeholder('Falg') }}
                                    @error('flag')
                                    <small class="text-danger">{{ $errors->first('flag') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="form-label">Tax Name</label>
                                    {{ html()->text($name = 'tax_name', ($settings) ? $settings->tax_name : old('tax_name'))->class('form-control')->placeholder('Tax Name') }}
                                    @error('tax_name')
                                    <small class="text-danger">{{ $errors->first('tax_name') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="form-label">Tax %</label>
                                    {{ html()->number($name = 'tax_percentage', ($settings) ? $settings->tax_percentage : old('tax_percentage'), $min='0', $max='99', $step='any')->class('form-control')->placeholder('0') }}
                                    @error('tax_percentage')
                                    <small class="text-danger">{{ $errors->first('tax_percentage') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="form-label">Currency</label>
                                    {{ html()->text($name = 'currency', ($settings) ? $settings->currency : old('currency'))->class('form-control')->placeholder('0') }}
                                    @error('currency')
                                    <small class="text-danger">{{ $errors->first('currency') }}</small>
                                    @enderror
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Currency Symbol</label>
                                    {{ html()->text($name = 'currency_symbol', ($settings) ? $settings->currency_symbol : old('currency_symbol'))->class('form-control')->placeholder('Currency Symbol') }}
                                    @error('currency_symbol')
                                    <small class="text-danger">{{ $errors->first('currency_symbol') }}</small>
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
</section> <!-- content-main end// -->
@endsection