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

    @include('enrollment.create.title')
    @include('enrollment.create.banner')

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
            @csrf
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('MODULES ASSOCIATED WITH UNITS OF COMPETENCE') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($commonCourses as $course)
                                    <div class="col-md-6">
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
                            <h4 class="card-title">{{ __('MODULES ASSOCIATED WITH COMMON BLOCKS') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($commonCourses1 as $course)
                                    <div class="col-md-6">
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
                            <h4 class="card-title">{{ __('TRAINING MODULES IN WORK CENTERS') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($commonCourses2 as $course)
                                    <div class="col-md-6">
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

