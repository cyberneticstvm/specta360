@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Profile</h2>
            <p>Hello {{ Auth::user()->name }}, You can edit your profile here!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-user">
                            <div class="card-header">
                                <img class="img-md img-avatar" src="{{ (!empty(Auth::user()->photo)) ? url(Auth::user()->photo) : asset('/backend/assets/imgs/people/avatar1.jpg') }}" alt="User pic">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-50">{{ Auth::user()->name }}</h5>
                                <div class="card-text text-muted">
                                    <p class="m-0">{{ Auth::user()->phone }}</p>
                                    <p>{{ Auth::user()->email }}</p>
                                    <form class="mt-3" method="post" action="{{ route('admin.profile.photo.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        {{ html()->file($name = 'photo')->class('form-control form-control-md profilePhoto')->required() }}
                                        @error('photo')
                                        <small class="text-danger">{{ $errors->first('photo') }}</small>
                                        @enderror
                                        <button type="submit" class="btn btn-submit btn-md btn-brand rounded font-sm mt-15">Update Photo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <h4 class="card-title mb-4">Edit Profile</h4>
                        <form method="post" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        {{ html()->text($name = 'name', $value = Auth::user()->name)->class('form-control')->placeholder('Full Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        {{ html()->text($name = 'username', $value = Auth::user()->username)->class('form-control')->disabled()->placeholder('Username') }}
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        {{ html()->email($name = 'email', (old('email')) ? old('email') : $value = Auth::user()->email)->class('form-control')->placeholder('Email') }}
                                        @error('email')
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        {{ html()->text($name = 'phone', $value = (old('phone')) ? old('phone') : Auth::user()->phone)->class('form-control')->maxlength(10)->placeholder('Phone') }}
                                        @error('phone')
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        {{ html()->textarea($name = 'address', $value = (old('address')) ? old('address') : Auth::user()->address)->class('form-control')->placeholder('Address') }}
                                        @error('address')
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-submit btn-primary w-100"> Update Profile</button>
                            </div> <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection