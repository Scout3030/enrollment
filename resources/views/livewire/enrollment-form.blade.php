<form class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
    @csrf
    <div class="row">
        <!-- custom option checkbox -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Select your level and grade') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="level_id">{{ __('Level/Grade') }}</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="select2 form-select" id="level_id" name="level_id">
                                        @foreach(\App\Models\Level::get() as $level)
                                            <option value="{{ $level->id }}">{{ __($level->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="select2 form-select" id="grade_id" name="grade_id"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / basic custom options -->
    </div>

    <div class="row">
        <!-- custom option checkbox -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Level courses') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        @forelse($levelCourses as $course)
                        <div class="col-md-3">
                            <input
                                class="custom-option-item-check"
                                type="checkbox"
                                name="level_courses[]"
                                id="level_course_{{ $course->id }}"
                                checked
                                disabled
                            />
                            <label class="custom-option-item p-1" for="level_course_{{ $course->id }}">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">{{ $course->name }}</span>
                                </span>
                                <small class="d-block">Get 20% off on your next purchase.</small>
                            </label>
                        </div>
                        @empty
                            {{ __('Select level and grade') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- / basic custom options -->
    </div>

    <div class="row">
        <!-- custom option checkbox -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Optional courses') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        @forelse($levelCourses as $course)
                        <div class="col-md-6">
                            <input
                                class="custom-option-item-check"
                                type="checkbox"
                                name="optional_course[]"
                                id="optional_course_{{ $course->id }}"
                                value="{{ $course->id }}"
                            />
                            <label class="custom-option-item p-1" for="optional_course_{{ $course->id }}">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">{{ $course->name }}</span>
                                </span>
                                <small class="d-block">Get 20% off on your next purchase.</small>
                            </label>
                        </div>
                        @empty
                            {{ __('Select level and grade') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- / basic custom options -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Request transportation?') }}</h4>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="demo-inline-spacing">
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="transportation"
                                        id="transportation_yes"
                                        value="1"
                                    />
                                    <label class="form-check-label" for="transportation_yes">{{ __('Yes') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="transportation"
                                        id="transportation_no"
                                        value="0"
                                        checked
                                    />
                                    <label class="form-check-label" for="transportation_no">{{ __('No') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="transportationBlock" class="pt-2 {{ old('transportation') ? (old('transportation') == 1 ? null : 'd-none') : 'd-none' }}">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="route_id">{{ __('Route and bus stop') }}</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="select2 form-select" id="route_id" name="route_id">
                                        @foreach(\App\Models\Route::get() as $route)
                                            <option value="{{ $route->id }}">{{ $route->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="select2 form-select" id="bus_stop_id" name="bus_stop_id"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                        {{--                                <div class="d-grid col-lg-6 col-md-12">--}}
                        {{--                                    <button type="button" class="btn btn-outline-primary">Block level button</button>--}}
                        {{--                                </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

