@if( !in_array(auth()->user()->student->grade->level->id, [\App\Models\Level::BACHELOR, \App\Models\Level::EDUCATIONAL_CYCLE]) )
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
                                     @if(old('transportation') == '1') checked="checked" @endif
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
                                    @if(old('transportation') == '0') checked="checked" @endif
                                    @if(!old('transportation')) checked="checked" @endif
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
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Bilingual english') }} <span style="font-size: 14px; font-weight: normal">({{ __('Courses with *') }})</span></h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="bilingual"
                                    id="bilingual_yes"
                                    value="1"
                                     @if(old('bilingual') == '1') checked="checked" @endif

                                />
                                <label class="form-check-label" for="bilingual_yes">{{ __('Yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="bilingual"
                                    id="bilingual_no"
                                    value="0"
                                    @if(old('bilingual') == '0') checked="checked" @endif
                                    @if(!old('bilingual')) checked="checked" @endif
                                />
                                <label class="form-check-label" for="bilingual_no">{{ __('No') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-block">
                <h4 class="card-title">{{ __('Course repeated?') }}</h4>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="repeat_course"
                                    id="repeat_course_yes"
                                    value="1"
                                    @if(old('repeat_course') == '1') checked="checked" @endif
                                />
                                <label class="form-check-label" for="repeat_course_yes">{{ __('Yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="repeat_course"
                                    id="repeat_course_no"
                                    value="0"
                                    @if(old('repeat_course') == '0') checked="checked" @endif
                                    @if(!old('repeat_course')) checked="checked" @endif
                                />
                                <label class="form-check-label" for="repeat_course_no">{{ __('No') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
