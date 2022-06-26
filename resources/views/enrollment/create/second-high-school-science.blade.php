@extends('layouts.app')

@push('vendor-styles')
    <style>
        .numerator span{
            margin: 14px;
        }
        .numerator:last-child span{
            margin: 12px 0 0 0;
        }
        @media screen and (max-width: 480px) {
            .draw-signature-holder, .draw-signature-holdertutor1, .draw-signature-holdertutor2, .text-signature  {
                max-width: 100% !important;
            }
        }
    </style>
@endpush

@section('title', __('Create your enrollment'))

@section('content')

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">{{ __('Create your enrollment') }}</h2>
            </div>
        </div>
    </div>

    @include('enrollment.create.banner')

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
            @csrf
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Core') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($commonCourses as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="common_courses"
                                            id="common_courses_{{ $course->id }}"
                                            checked
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="common_courses_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
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
                            <h4 class="card-title">{{ __('Core modality') }}</h4>
                        </div>
                        <div class="row">
                         <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-check form-check-inline" onclick="active1()">
                                <input
                                    class="form-check-input  active_1"
                                    type="radio"
                                    name="active1"
                                    id="active_option_1"
                                    value="1"
                                    {{ old('active1') == "1" ? 'checked' : ''}}
                                />
                                <label class="form-check-label" for="active_option_1">{{ __('Option 1') }}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($modalitiesCourses as $course)
                                    <div class="row-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="modaly_course1"
                                            id="modaly_course1_{{ $course->id }}"
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="modaly_course1_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-check form-check-inline" onclick="active1()">
                                <input
                                    class="form-check-input  active_1"
                                    type="radio"
                                    name="active1"
                                    id="active_option_2"
                                    value="2"
                                    {{ old('active1') == "1" ? 'checked' : ''}}
                                />
                                <label class="form-check-label" for="active_option_2">{{ __('Option 2') }}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($modalitiesCourses2 as $course)
                                    <div class="row-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="modaly_course2"
                                            id="modaly_course2_{{ $course->id }}"
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="modaly_course2_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-check form-check-inline" onclick="active1()">
                                <input
                                    class="form-check-input  active_1"
                                    type="radio"
                                    name="active1"
                                    id="active_option_3"
                                    value="2"
                                    {{ old('active1') == "1" ? 'checked' : ''}}
                                />
                                <label class="form-check-label" for="active_option_3">{{ __('Option 3') }}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($modalitiesCourses3 as $course)
                                    <div class="row-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="modaly_course3"
                                            id="modaly_course3_{{ $course->id }}"
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="modaly_course3_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                           <div class="form-check form-check-inline" onclick="active1()">
                                <input
                                    class="form-check-input  active_1"
                                    type="radio"
                                    name="active1"
                                    id="active_option_4"
                                    value="4"
                                    {{ old('active1') == "1" ? 'checked' : ''}}
                                />
                                <label class="form-check-label" for="active_option_4">{{ __('Option 4') }}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($modalitiesCourses4 as $course)
                                    <div class="row-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="modaly_course4"
                                            id="modaly_course4_{{ $course->id }}"
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="modaly_course4_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-check form-check-inline" onclick="active1()">
                                <input
                                    class="form-check-input  active_1"
                                    type="radio"
                                    name="active1"
                                    id="active_option_5"
                                    value="5"
                                    {{ old('active1') == "1" ? 'checked' : ''}}
                                />
                                <label class="form-check-label" for="active_option_5">{{ __('Option 5') }}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($modalitiesCourses5 as $course)
                                    <div class="row-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="modaly_course5"
                                            id="modaly_course5_{{ $course->id }}"
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="modaly_course5_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
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

                <!-- / basic custom options -->
            </div>

            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('optional courses') }}</h4>
                            <p>{{ __('You are allowed to select courses from one of two options') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="mb-1 row">
                            <div class="col-sm-12">
                                <div class="demo-inline-spacing">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active()">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="active"
                                                id="active_si"
                                                value="1"
                                                {{ old('active') == "1" ? 'checked' : ''}}
                                            />
                                            <label class="form-check-label" for="active_si">{{ __('MODALITY SUBJECTS NOT STUDIED') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-6 col-xl-12">
                                <div class="card">
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">

                                                <div id="sortable5" class="row custom-options-checkable g-1">
                                                    @forelse($coursesItineraryB as $key => $course)
                                                        <div class="row1" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                            <div class="col-md-12">
                                                                <input
                                                                    class="custom-option-item-check"
                                                                    type="checkbox"
                                                                    name="core_itinerary_a[]"
                                                                    id="core_itinerary_a_{{ $course->id }}"
                                                                     value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                                    checked
                                                                     onclick="this.checked = true"

                                                                />
                                                                <label class="custom-option-item p-1" for="core_itinerary_a_{{ $course->id }}">
                                                                    <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                        <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        {{ __('Select level and grade') }}
                                                    @endforelse
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- / basic custom options -->

                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="mb-1 row">
                            <div class="col-sm-12">
                                <div class="demo-inline-spacing">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active()">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="active"
                                                id="active_no"
                                                value="0"
                                                {{ old('active') == "0" ? 'checked' : ''}}
                                            />
                                            <label class="form-check-label" for="active_no">{{ __('COURSES THE 3 h') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="sortable6" class="row custom-options-checkable g-1">
                                        @forelse($coursesItineraryC as $key => $course)
                                            <div class="row2" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="core_itinerary_b[]"
                                                        id="core_itinerary_b_{{ $course->id }}"
                                                         value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                        checked
                                                         onclick="this.checked = true"

                                                    />
                                                    <label class="custom-option-item p-1" for="core_itinerary_b_{{ $course->id }}">
                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                            <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @empty
                                            {{ __('Select level and grade') }}
                                        @endforelse
                                    </div>
                                </div>
                                <div class="card-body">
                                 <div class="card-header">
                                        <h5>{{ __('COURSES THE 1 h') }}</h5>
                                    </div>
                                    <div id="sortable4" class="row custom-options-checkable g-1">
                                        @forelse($coursesItineraryD as $key => $course)
                                            <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="core_itinerary_c[]"
                                                        id="core_itinerary_c_{{ $course->id }}"
                                                        checked
                                                        value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                         onclick="this.checked = true"
                                                    />
                                                    <label class="custom-option-item p-1" for="core_itinerary_c_{{ $course->id }}">
                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                            <span class="fw-bolder">{{ __($course->name).' '.($course->bilingual ? '*' : '') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @empty
                                            {{ __('Select level and grade') }}
                                        @endforelse
                                    </div>

                                </div>
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
                                                <input type="hidden" class="form-control" id="sign" name="sign"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('enrollment.create.signatures')

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
        @include('livewire.enrollment.components.modal' )
        @include('layouts.partials.toast', ['message' => __('Great'), 'description' => __('Order updated successfully')])
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>// Default Spin

        $('.row51').each(function(index, element) {
            document.getElementById("modaly_course1_"+$(this).attr('course_id')).checked = false;
        });
        $('.row1').each(function(index, element) {
            document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
        });
        $('.row2').each(function(index, element) {
            document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = false;
        });
        $('.row3').each(function(index, element) {
            document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = false;
        });
        $('.row4').each(function(index, element) {
            document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = false;
        });

        function activeOption(){

        }
        function active(){
            if($('input:radio[name=active]:checked').val()==1){

                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = false;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = false;
                });
                $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = false;
                });
                 $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = true;
                });
            }else{

                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = true;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = true;
                });
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
                });
               $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = true;
                });
                 $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
                });
            }
        }
        $(function() {
            $("#sortable5").sortable({
                update: function() {
                    hour4Coue();
                    toast.show();
                }
            });
            function hour4Coue() {
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable6").sortable({
                update: function() {
                    hour3Ce();
                    toast.show();
                }
            });
            function hour3Ce() {
                $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }

              $("#sortable4").sortable({
                update: function() {
                    hour4Course();
                    toast.show();
                }
            });
            function hour4Course() {
                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
        });



        @if(!is_null(old('active')))
        active()
        @endif

        @if(!is_null(old('active_option')))
        activeOption()
        @endif
    </script>
@endpush

