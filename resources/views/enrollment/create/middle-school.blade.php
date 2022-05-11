@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
@endpush

@section('content')

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">{{ __('Create your enrollment') }}</h2>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
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

            @if(auth()->user()->student->grade->id == \App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Academic courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($academicCourses as $key => $course)
                                    <div class="col-md-6">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="academic_courses[]"
                                            id="academic_course_{{ $course->id }}"
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

                <!-- custom option checkbox -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Applied courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($appliedCourses as $key => $course)
                                    <div class="col-md-6">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="applied_courses[]"
                                            id="applied_course_{{ $course->id }}"
                                            value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                            checked
                                        />
                                        <label class="custom-option-item p-1" for="applied_course_{{ $course->id }}">
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
            @endif

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

            @if(auth()->user()->student->grade->id == \App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                <div class="row">
                    <!-- custom option checkbox -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Free configuration courses') }}</h4>
                                <p>{{ __('free configuration courses info') }}</p>
                            </div>
                            <div class="card-body">
                                <div class="row custom-options-checkable g-1">
                                    @forelse($freeConfigurationCourses as $key => $course)
                                        <div class="col-md-3">
                                            <input
                                                class="custom-option-item-check"
                                                type="checkbox"
                                                name="free_configuration_courses[]"
                                                id="free_configuration_course_{{ $course->id }}"
                                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                checked
                                            />
                                            <label class="custom-option-item p-1" for="free_configuration_course_{{ $course->id }}">
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
            @endif

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

    </section>
@endsection

@push('vendor-scripts')
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script>
        $(document).ready(function() {
            const levelNode = $('#level_id')
            const gradeNode = $("#grade_id")
            const routeNode = $("#route_id")
            const busStopNode = $("#bus_stop_id")
            $('.select2').select2();

            @if(!auth()->user()->student->grade_id)
            let firstLevelId = levelNode.select2().val()
            populateSelect(firstLevelId)
            @endif

            let firstRouteId = routeNode.select2().val()
            populateBusStopSelect(firstRouteId)

            levelNode.on('change', function(){
                const levelId = $(this).val()
                populateSelect(levelId)
            })

            routeNode.on('change', function(){
                const levelId = $(this).val()
                populateBusStopSelect(levelId)
            })

            $('input[name=transportation]').change(function(){
                let value = $( 'input[name=transportation]:checked' ).val();
                const transportationBlockNode = $('#transportationBlock')
                if(parseInt(value) === 1){
                    transportationBlockNode.removeClass('d-none')
                }else{
                    transportationBlockNode.addClass('d-none')
                }
            });

            gradeNode.on('change', function(){
                const gradeId = $(this).val()
                Livewire.emit('getCourses', gradeId)
                let levelId = levelNode.select2().val() || levelNode.val()
                setTimeout(function (){
                    populateLevelSelect()
                    populateSelect(levelId)
                    console.log('levelId', levelId)
                    // setTimeout(function (){
                    //     levelNode.val(2).trigger('change')
                    // }, 200)
                    // gradeNode.val(gradeId).trigger('change')
                }, 200)
            })

            $('#confirmEnrollmentButton').on('click', function(){
                $('#enrollmentForm').submit()
            })

            function populateSelect(levelId){
                $.ajax({
                    url: `{{ route('grades.index') }}/level/${levelId}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            gradeNode.empty();
                            gradeNode.select2({
                                data: data.data
                            });
                        }
                    }
                })
            }

            function populateLevelSelect(){
                $.ajax({
                    url: `{{ route('levels.index') }}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            levelNode.empty();
                            levelNode.select2({
                                data: data.data
                            });
                        }
                    }
                })
            }

            function populateBusStopSelect(routeId){
                $.ajax({
                    url: `{{ route('busStop.index') }}/route/${routeId}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            busStopNode.empty();
                            busStopNode.select2({
                                data: data.data
                            });
                        }
                    }
                })
            }
        });
    </script>
@endpush

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
