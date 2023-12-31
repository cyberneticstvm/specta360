@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New Slider</h2>
            <p>Hello {{ Auth::user()->name }}, You can create your slider here!</p>
            @include('message1')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <form method="post" action="{{ route('admin.slider.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Title</label>
                                        {{ html()->text($name = 'title', $value = old('title'))->class('form-control')->placeholder('Slider Title') }}
                                        @error('title')
                                        <small class="text-danger">{{ $errors->first('title') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Short Title</label>
                                        {{ html()->text($name = 'short_title', $value = old('short_title'))->class('form-control')->placeholder('Slider Short Title') }}
                                        @error('short_title')
                                        <small class="text-danger">{{ $errors->first('short_title') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Bottom Title</label>
                                        {{ html()->text($name = 'bottom_title', $value = old('bottom_title'))->class('form-control')->placeholder('Slider Bottom Title') }}
                                        @error('bottom_title')
                                        <small class="text-danger">{{ $errors->first('bottom_title') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Short Description</label>
                                        {{ html()->text($name = 'short_description', $value = old('short_description'))->class('form-control')->placeholder('Slider Short Description') }}
                                        @error('short_description')
                                        <small class="text-danger">{{ $errors->first('short_description') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Image </label>&nbsp;<small class="text-muted">(Max file size should be 500KB and 965w x 545h)</small>
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