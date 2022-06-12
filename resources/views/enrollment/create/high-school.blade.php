@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <style>
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

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
            @csrf
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
                            <h4 class="card-title">{{ __('Core courses') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @foreach($coreCourses as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="core_course"
                                            id="core_course_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            @once checked @endonce
                                        />
                                        <label class="custom-option-item p-1" for="core_course_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / basic custom options -->
            </div>

            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="mb-1 row">
                            <div class="col-sm-10">
                                <div class="demo-inline-spacing">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Option 1 (4+3)') }}</h4>
                                    </div>
                                    <div class="form-check form-check-inline" onclick="active()">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="active"
                                            id="active_si"
                                            value="1"
                                        />
                                        <label class="form-check-label" for="active_si">{{ __('Select') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="sortable" class="row custom-options-checkable g-1">
                                <h3>{{ __('Four hours courses') }}</h3>
                                @forelse($hours4Courses as $key => $course)
                                    <div class="row1" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                        <div class="col-md-12">
                                            <input
                                                class="custom-option-item-check"
                                                type="checkbox"
                                                name="hour_4_course[]"
                                                id="hour_4_course_{{ $course->id }}"
                                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                            />
                                            <label class="custom-option-item p-1" for="hour_4_course_{{ $course->id }}">
                                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                                    <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
                            </div>
                            <div id="sortable1" class="row custom-options-checkable g-1 pt-2">
                                <h3>{{ __('Three hours courses') }}</h3>
                                @forelse($hours3Courses as $key => $course)
                                    <div class="row2" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                        <div class="col-md-12">
                                            <input
                                                class="custom-option-item-check"
                                                type="checkbox"
                                                name="hour_3_course[]"
                                                id="hour_3_course_{{ $course->id }}"
                                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                            />
                                            <label class="custom-option-item p-1" for="hour_3_course_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
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
                <!-- / basic custom options -->

                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="mb-1 row">
                            <div class="col-sm-10">
                                <div class="demo-inline-spacing">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Option 2 (3+3+1)') }}</h4>
                                    </div>
                                    <div class="form-check form-check-inline" onclick="active()">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="active"
                                            id="active_no"
                                            value="0"
                                        />
                                        <label class="form-check-label" for="active_no">{{ __('Select') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="sortable2" class="row custom-options-checkable g-1">
                                <h3>{{ __('Three hours courses') }}</h3>
                                @forelse($hours3Courses as $key => $course)
                                    <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                        <div class="col-md-12">
                                            <input
                                                class="custom-option-item-check"
                                                type="checkbox"
                                                name="b_hour_3_courses[]"
                                                id="b_hour_3_course_{{ $course->id }}"
                                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                            />
                                            <label class="custom-option-item p-1" for="b_hour_3_course_{{ $course->id }}">
                                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                                    <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    {{ __('Select level and grade') }}
                                @endforelse
                            </div>
                            <div id="sortable3" class="row custom-options-checkable g-1 pt-2">
                                <h3>{{ __('One hour courses') }}</h3>
                                @forelse($hours1Courses as $key => $course)
                                    <div class="row4" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                        <div class="col-md-12">
                                            <input
                                                class="custom-option-item-check"
                                                type="checkbox"
                                                name="b_hour_1_course[]"
                                                id="b_hour_1_course_{{ $course->id }}"
                                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'

                                            />
                                            <label class="custom-option-item p-1" for="b_hour_1_course_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>// Default Spin
        $( "#sortable" ).sortable({
            disabled: true,
        });
        $( "#sortable1" ).sortable({
            disabled: true,
        });
        $( "#sortable2" ).sortable({
            disabled: true,
        });
        $( "#sortable3" ).sortable({
            disabled: true,
        });
        function active(){
            if($('input:radio[name=active]:checked').val()==1){
                $( "#sortable" ).sortable();
                $( "#sortable1" ).sortable();
                $( "#sortable" ).sortable( "option", "disabled", false );
                $( "#sortable" ).disableSelection();
                $( "#sortable1" ).sortable( "option", "disabled", false );
                $( "#sortable1" ).disableSelection();
                $('.row1').each(function(index, element) {
                    document.getElementById("hour_4_course_"+$(this).attr('course_id')).checked = true;
                });
                $('.row2').each(function(index, element) {
                    document.getElementById("hour_3_course_"+$(this).attr('course_id')).checked = true;
                });
                $( "#sortable2" ).sortable({
                    disabled: true,
                });
                $( "#sortable3" ).sortable({
                    disabled: true,
                });
                $('.row3').each(function(index, element) {
                    document.getElementById("b_hour_3_course_"+$(this).attr('course_id')).checked = false;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("b_hour_1_course_"+$(this).attr('course_id')).checked = false;
                });
            }else{
                $( "#sortable2" ).sortable();
                $( "#sortable3" ).sortable();
                $( "#sortable2" ).sortable( "option", "disabled", false );
                $( "#sortable2" ).disableSelection();
                $( "#sortable3" ).sortable( "option", "disabled", false );
                $( "#sortable3" ).disableSelection();
                $('.row3').each(function(index, element) {
                    document.getElementById("b_hour_3_course_"+$(this).attr('course_id')).checked = true;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("b_hour_1_course_"+$(this).attr('course_id')).checked = true;
                });
                $( "#sortable" ).sortable({
                    disabled: true,
                });
                $( "#sortable1" ).sortable({
                    disabled: true,
                });
                $('.row1').each(function(index, element) {
                    document.getElementById("hour_4_course_"+$(this).attr('course_id')).checked = false;
                });
                $('.row2').each(function(index, element) {
                    document.getElementById("hour_3_course_"+$(this).attr('course_id')).checked = false;
                });
            }
        }
        $(function() {
            $("#sortable").sortable({
                update: function() {
                    hour4Course();
                }
            });
            function hour4Course() {
                $('.row1').each(function(index, element) {
                    document.getElementById("hour_4_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable1").sortable({
                update: function() {
                    hour3Course();
                }
            });
            function hour3Course() {
                $('.row2').each(function(index, element) {
                    document.getElementById("hour_3_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable2").sortable({
                update: function() {
                    bHour3Course();
                }
            });
            function bHour3Course() {
                $('.row3').each(function(index, element) {
                    document.getElementById("b_hour_3_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable3").sortable({
                update: function() {
                    bHour1Course();
                }
            });
            function bHour1Course() {
                $('.row4').each(function(index, element) {
                    document.getElementById("b_hour_1_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
        });
    </script>
@endpush

