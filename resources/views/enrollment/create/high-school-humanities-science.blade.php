@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
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

    <@include('enrollment.create.title')
    @include('enrollment.create.banner')

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
            @csrf
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Common subjects') }}</h4>
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
                                                <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
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
                            <h4 class="card-title">{{ __('Itineraries') }}</h4>
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
                                            <label class="form-check-label" for="active_si">{{ __('Humanities') }}</label>
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
                                            <div class="row custom-options-checkable g-1">
                                                @foreach($modalitiesCourses as $key => $course)
                                                    <div class="row1" course_id="{{ $course->id }}">
                                                        <div class="col-md-12">
                                                            <input
                                                                class="custom-option-item-check"
                                                                type="checkbox"
                                                                name="core_itinerary_a"
                                                                id="core_itinerary_a_{{ $course->id }}"
                                                                checked
                                                                disabled
                                                            />
                                                            <label class="custom-option-item p-1" for="core_itinerary_a_{{ $course->id }}">
                                                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-header pt-3">
                                            <h4 class="card-title">{{ __('Select one option') }} ({{ __('mandatory') }})</h4>
                                        </div>
                                        <div>
                                            <div class="row custom-options-checkable g-1">
                                                @foreach($coursesItineraryA as $course)
                                                    <div class="rowone"  course_id="{{ $course->id }}">
                                                        <input
                                                            class="custom-option-item-check"
                                                            type="radio"
                                                            name="one_courses"
                                                            id="one_courses_{{ $course->id }}"
                                                            disabled
                                                            value="{{ $course->id }}"
                                                            {{ old('one_courses') == $course->id ? 'checked' : ''}}
                                                        />
                                                        <label class="custom-option-item p-1" for="one_courses_{{ $course->id }}">
                                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
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
                                            <label class="form-check-label" for="active_no">{{ __('Social Sciences') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-sm-6 col-xl-12">
                                        <div class="card">
                                            <div class="mb-1 row">
                                                <div class="col-sm-12">
                                                    <div class="row custom-options-checkable g-1">
                                                        @foreach($modalityOption as $key => $course)
                                                            <div class="row2" course_id="{{ $course->id }}">
                                                                <div  class="col-md-12">
                                                                    <input
                                                                        class="custom-option-item-check"
                                                                        type="checkbox"
                                                                        name="core_itinerary_b"
                                                                        id="core_itinerary_b_{{ $course->id }}"
                                                                        disabled
                                                                        checked
                                                                        onclick="this.checked = true"
                                                                    />
                                                                    <label class="custom-option-item p-1" for="core_itinerary_b_{{ $course->id }}">
                                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                            <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="card-header pt-3">
                                                        <h4 class="card-title">{{ __('Select one option') }} ({{ __('mandatory') }})</h4>
                                                    </div>
                                                    <div class="row custom-options-checkable g-1">
                                                        @foreach($coursesItinerarySciences as $course)
                                                            <div class=" rowone2"  course_id="{{ $course->id }}">
                                                                <input
                                                                    class="custom-option-item-check"
                                                                    type="radio"
                                                                    name="one_courses2"
                                                                    id="one_courses2_{{ $course->id }}"
                                                                    disabled
                                                                    value="{{ $course->id }}"
                                                                    {{ old('one_courses2') == $course->id ? 'checked' : ''}}
                                                                />
                                                                <label class="custom-option-item p-1" for="one_courses2_{{ $course->id }}">
                                                                    <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
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
                            <h4 class="card-title">{{ __('Optional subjects') }}</h4>
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
                                        <div class="form-check form-check-inline" onclick="active1()">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="active1"
                                                id="active_si1"
                                                value="1"
                                                {{ old('active1') == "1" ? 'checked' : ''}}
                                            />
                                            <label class="form-check-label" for="active_si1">{{ __('MODALITY SUBJECTS NOT STUDIED') }}</label>
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
                                                @foreach($coursesItineraryC as $key => $course)
                                                    <div class="row15" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                        <div class="col-md-12">
                                                            <input
                                                                class="custom-option-item-check"
                                                                type="checkbox"
                                                                name="core_itinerary_a5[]"
                                                                id="core_itinerary_a5_{{ $course->id }}"
                                                                value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                                checked
                                                                onclick="this.checked = true"
                                                            />
                                                            <label class="custom-option-item p-1" for="core_itinerary_a5_{{ $course->id }}">
                                                                <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
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
                                        <div class="form-check form-check-inline" onclick="active1()">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="active1"
                                                id="active_no1"
                                                value="0"
                                                {{ old('active1') == "0" ? 'checked' : ''}}
                                            />
                                            <label class="form-check-label" for="active_no1">{{ __('COURSES THE 3 h') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="sortable6" class="row custom-options-checkable g-1">
                                        @forelse($coursesItineraryB as $key => $course)
                                            <div class="row25" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="core_itinerary_b5[]"
                                                        id="core_itinerary_b5_{{ $course->id }}"
                                                        value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                        checked
                                                        onclick="this.checked = true"

                                                    />
                                                    <label class="custom-option-item p-1" for="core_itinerary_b5_{{ $course->id }}">
                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                            <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
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
                                            <div class="row35" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="core_itinerary_c5[]"
                                                        id="core_itinerary_c5_{{ $course->id }}"
                                                        checked
                                                        value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                        onclick="this.checked = true"
                                                    />
                                                    <label class="custom-option-item p-1" for="core_itinerary_c_{{ $course->id }}">
                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                            <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
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
                        <div class="card-header d-block">
                            @foreach($coursesSpecific as $course)
                                <h4 class="card-title">{{ __($course->name) }}</h4>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="demo-inline-spacing">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="modality"
                                                id="modality_yes"
                                                value="1"
                                            />
                                            <label class="form-check-label" for="modality_yes">{{ __('Yes') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="modality"
                                                id="modality_no"
                                                value="0"
                                                checked
                                            />
                                            <label class="form-check-label" for="modality_no">{{ __('No') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('enrollment.create.transportation-bilingual-repeat')
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


        $('.row1').each(function(index, element) {
            document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
        });
        $('.rowone').each(function(index, element) {
            document.getElementById("one_courses_"+$(this).attr('course_id')).checked = false;
        });
        $('.rowone2').each(function(index, element) {
            document.getElementById("one_courses2_"+$(this).attr('course_id')).checked = false;
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

        $('.row15').each(function(index, element) {
            document.getElementById("core_itinerary_a5_"+$(this).attr('course_id')).checked = false;
        });
        $('.row25').each(function(index, element) {
            document.getElementById("core_itinerary_b5_"+$(this).attr('course_id')).checked = false;
        });
        $('.row35').each(function(index, element) {
            document.getElementById("core_itinerary_c5_"+$(this).attr('course_id')).checked = false;
        });
        $('.row45').each(function(index, element) {
            document.getElementById("core_itinerary_d5_"+$(this).attr('course_id')).checked = false;
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
                $('.rowone').each(function(index, element) {
                    document.getElementById("one_courses_"+$(this).attr('course_id')).disabled = false;
                });
                $('.rowone2').each(function(index, element) {
                    document.getElementById("one_courses2_"+$(this).attr('course_id')).disabled = true;
                });

                $('.rowone2').each(function(index, element) {
                    document.getElementById("one_courses2_"+$(this).attr('course_id')).checked = false;
                });

            }else{

                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = true;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = true;
                });
                $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = true;
                });
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
                });
                $('.rowone').each(function(index, element) {
                    document.getElementById("one_courses_"+$(this).attr('course_id')).disabled = true;
                });

                $('.rowone').each(function(index, element) {
                    document.getElementById("one_courses_"+$(this).attr('course_id')).checked = false;
                });
                $('.rowone2').each(function(index, element) {
                    document.getElementById("one_courses2_"+$(this).attr('course_id')).disabled = false;
                });

            }
        }
        function active1(){
            if($('input:radio[name=active1]:checked').val()==1){

                $('.row35').each(function(index, element) {
                    document.getElementById("core_itinerary_c5_"+$(this).attr('course_id')).checked = false;
                });
                $('.row45').each(function(index, element) {
                    document.getElementById("core_itinerary_d5_"+$(this).attr('course_id')).checked = false;
                });
                $('.row25').each(function(index, element) {
                    document.getElementById("core_itinerary_b5_"+$(this).attr('course_id')).checked = false;
                });
                $('.row15').each(function(index, element) {
                    document.getElementById("core_itinerary_a5_"+$(this).attr('course_id')).checked = true;
                });


            }else{

                $('.row35').each(function(index, element) {
                    document.getElementById("core_itinerary_c5_"+$(this).attr('course_id')).checked = true;
                });
                $('.row45').each(function(index, element) {
                    document.getElementById("core_itinerary_d5_"+$(this).attr('course_id')).checked = true;
                });
                $('.row25').each(function(index, element) {
                    document.getElementById("core_itinerary_b5_"+$(this).attr('course_id')).checked = true;
                });
                $('.row15').each(function(index, element) {
                    document.getElementById("core_itinerary_a5_"+$(this).attr('course_id')).checked = false;
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
                $('.row15').each(function(index, element) {
                    document.getElementById("core_itinerary_a5_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable6").sortable({
                update: function() {
                    hour3Ce();
                    toast.show();
                }
            });
            function hour3Ce() {
                $('.row25').each(function(index, element) {
                    document.getElementById("core_itinerary_b5_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }

            $("#sortable4").sortable({
                update: function() {
                    hour4Course();
                    toast.show();
                }
            });
            function hour4Course() {
                $('.row35').each(function(index, element) {
                    document.getElementById("core_itinerary_c5_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
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

