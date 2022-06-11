<section id="basic-horizontal-layouts">
    <form class="form form-horizontal" method="POST" action="{{ route('user.profile.update') }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Edit profile') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">{{ __('Name') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="name"
                                               value="{{ old('name', auth()->user()->name) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="email">{{ __('Email') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" class="form-control" name="email"
                                               value="{{ auth()->user()->email }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="password">{{ __('Password') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="password" id="password" class="form-control" name="password"
                                               placeholder="***************" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="password_confirmation">{{ __('Password confirmation') }}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                               placeholder="***************" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 offset-sm-2 mt-4">
                                <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">{{ __('Return') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
