@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New Banner</h2>
            <p>Hello {{ Auth::user()->name }}, You can create your banner here!</p>
            @include('message1')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <form method="post" action="{{ route('admin.banner.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Title</label>
                                        {{ html()->text($name = 'title', $value = old('title'))->class('form-control')->placeholder('Banner Title') }}
                                        @error('title')
                                        <small class="text-danger">{{ $errors->first('title') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Label</label>
                                        {{ html()->text($name = 'label', $value = old('label'))->class('form-control')->placeholder('Banner Label') }}
                                        @error('label')
                                        <small class="text-danger">{{ $errors->first('label') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Image </label>&nbsp;<small class="text-muted">(Max file size should be 500KB)</small>
                                        {{ html()->file($name = 'image', $value = NULL)->class('form-control main_img') }}
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                    <div id="main_img" class="text-center"><img src="" /></div>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-4 text-center">                                
                            <button type="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                            <button type="submit" class="btn btn-submit btn-primary">Save</button>
                        </div> <!-- form-group// -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection