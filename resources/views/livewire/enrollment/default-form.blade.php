<form id="enrollmentForm" class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
    @csrf
    @if(!auth()->user()->student->grade_id)
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
    @endif
    <div class="row">
        <!-- custom option checkbox -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Level courses') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        @forelse($commonCourses as $course)
                        <div class="col-md-3">
                            <input
                                class="custom-option-item-check"
                                type="checkbox"
                                name="common_courses[]"
                                id="common_course_{{ $course->id }}"
                                checked
                                disabled
                            />
                            <label class="custom-option-item p-1" for="common_course_{{ $course->id }}">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                </span>
                            </label>
                        </div>
                        @empty
                            {{ __('Select level and grade') }}
                        @endforelse
                    </div>
                    @if(count($commonOptionalCourses) > 0)
                    <div class="row custom-options-checkable g-1">
                        <div class="col-md-12 pt-2">
                        {{ __('Select one option') }}
                        </div>
                        @foreach($commonOptionalCourses as $course)
                        <div class="col-md-3">
                            <input
                                class="custom-option-item-check"
                                type="radio"
                                name="common_optional_course"
                                id="common_optional_course_{{ $course->id }}"
                                value="{{ $course->id }}"
                                @once checked @endonce
                            />
                            <label class="custom-option-item p-1" for="common_optional_course_{{ $course->id }}">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                </span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endif
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
                    <p>{{ __('optional courses info') }}</p>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        @forelse($electiveCourses as $key => $course)
                        <div class="col-md-3">
                            <input
                                class="custom-option-item-check"
                                type="checkbox"
                                name="elective_courses[]"
                                id="elective_course_{{ $course->id }}"
                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                checked
                            />
                            <label class="custom-option-item p-1" for="elective_course_{{ $course->id }}">
                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                    <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                </span>
                                <small class="d-block">
                                    <div class="input-group">
                                        <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                    </div>
                                </small>
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
                                        checked
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
                                        checked
                                    />
                                    <label class="form-check-label" for="repeat_course_no">{{ __('No') }}</label>
                                </div>
                                <div class="offset-xl-1 col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="previous_school">{{ __('Previous school') }}</label>
                                        <input type="text" class="form-control" id="previous_school" name="previous_school" placeholder="{{ __('Type...') }}" />
                                    </div>
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
{{--                        <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">--}}
{{--                            <button--}}
{{--                                type="button"--}}
{{--                                data-bs-toggle="modal"--}}
{{--                                data-bs-target="#enrollmentModal"--}}
{{--                                class="btn btn-primary"--}}
{{--                            >{{ __('Continue') }}</button>--}}
{{--                        </div>--}}
                        <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                            <button
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#enrollmentModal"
                                class="btn btn-outline-primary"
                            >{{ __('Continue') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('livewire.enrollment.components.modal')

@push('scripts')
    <script>// Default Spin
        $('.touchspin').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',
            buttondown_txt: feather.icons['minus'].toSvg(),
            buttonup_txt: feather.icons['plus'].toSvg()
        });

        // Icon Change
        $('.touchspin-icon').TouchSpin({
            buttondown_txt: feather.icons['chevron-down'].toSvg(),
            buttonup_txt: feather.icons['chevron-up'].toSvg()
        });

        // Min - Max
        var touchspinValue = $('.touchspin-min-max'),
            counterMin = 1,
            counterMax = {{ count($electiveCourses) }};
        if (touchspinValue.length > 0) {
            touchspinValue
                .TouchSpin({
                    min: counterMin,
                    max: counterMax,
                    buttondown_txt: feather.icons['minus'].toSvg(),
                    buttonup_txt: feather.icons['plus'].toSvg()
                })
                .on('touchspin.on.startdownspin', function () {
                    var $this = $(this);
                    $('.bootstrap-touchspin-up').removeClass('disabled-max-min');
                    let node = $this.parent().parent().parent().parent().find('input.custom-option-item-check')
                    let val = JSON.parse($(node).val())
                    val.order = $this.val()
                    $(node).val(JSON.stringify(val))
                    if ($this.val() == counterMin) {
                        $(this).siblings().find('.bootstrap-touchspin-down').addClass('disabled-max-min');
                    }
                })
                .on('touchspin.on.startupspin', function () {
                    var $this = $(this);
                    $('.bootstrap-touchspin-down').removeClass('disabled-max-min');
                    let node = $this.parent().parent().parent().parent().find('input.custom-option-item-check')
                    let val = JSON.parse($(node).val())
                    val.order = $this.val()
                    $(node).val(JSON.stringify(val))
                    if ($this.val() == counterMax) {
                        $(this).siblings().find('.bootstrap-touchspin-up').addClass('disabled-max-min');
                    }
                });
        }
    </script>
@endpush

