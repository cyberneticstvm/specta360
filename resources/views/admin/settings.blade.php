@extends("admin.base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Settings</h2>
            <p>Hello {{ Auth::user()->name }}, You can edit your settings here!</p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <h4 class="card-title mb-4">Change Password</h4>
                        <form method="post" action="{{ route('admin.profile.settings.update') }}">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        {{ html()->text($name = 'password', NULL)->class('form-control')->placeholder('******') }}
                                        @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm New Password</label>
                                        {{ html()->text($name = 'password_confirmation', NULL)->class('form-control')->placeholder('******') }}
                                        @error('password_confirmation')
                                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-submit btn-primary w-100"> Update Password</button>
                            </div> <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection