@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <style>
        .numerator span{
            margin: 12px;
        }
        .numerator:last-child span{
            margin: 12px 0 0 0;
        }
        @media screen and (max-width: 480px) {
            .draw-signature-holder, .draw-signature-holdertutor1, .draw-signature-holdertutor2, .text-signature {
                max-width: 100% !important;
            }
        }

        .deskContent {
        width: 100%;
        height: 400px;
        background-repeat: no-repeat;
        background-size: contain; 
        }

        .phoneContent {
            width: 100%;
            height: 100px;
            background-repeat: no-repeat;
            background-size: contain;
        }

        @media all and (min-width: 480px) {
            .deskContent {display:block;}
            .phoneContent {display:none;}
        }

        @media all and (max-width: 479px) {
            .deskContent {display:none;}
            .phoneContent {display:block;}
        }
    </style>
@endpush

@section('title', __('Create your enrollment'))

@section('content')

    @include('enrollment.create.title')
    @include('enrollment.create.banner')

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('enrollment.store') }}">
            @csrf
                <div class="row">
                    <!-- custom option checkbox -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Common scope') }}</h4>
                            </div>
                            <div class="card-body">
                                <div  class="row custom-options-checkable g-1">
                                    @forelse($commonCoursesAreas as $course)
                                        <div class="col-md-3">
                                            <input
                                                class="custom-option-item-check"
                                                type="checkbox"
                                                name="common_courses_core[]"
                                                id="common_course_core{{ $course->id }}"
                                                checked
                                                disabled
                                            />
                                            <label class="custom-option-item p-1" for="common_course_{{ $course->id }}">
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
                            <h4 class="card-title">{{ __('Common courses') }}</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row custom-options-checkable g-1">
                                @forelse($commonCourses as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="common_courses_specific[]"
                                            id="common_course_specific{{ $course->id }}"
                                            checked
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="common_course_{{ $course->id }}">
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
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Optional courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-2 col-md-1 phoneContent">
                                    <div class="card mb-4  ">
                                        <ul class="list-group list-group-flush">
                                            @foreach($commonOptionalOneCourses as $course)
                                                <li class="list-group-item numerator">
                                                  <br>  <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-2 col-md-1 deskContent">
                                    <div class="card mb-4  ">
                                        <ul class="list-group list-group-flush">
                                            @foreach($commonOptionalOneCourses as $course)
                                                <li class="list-group-item numerator">
                                                    <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-10 col-md-11">
                                    <div id="sortable2" class="row list1 custom-options-checkable g-1">
                                        @if(old('elective_courses'))
                                            @foreach(old('elective_courses') as $order)
                                                @foreach($commonOptionalOneCourses as $key => $course)
                                                    @if(json_decode($order)->id == $course->id)
                                                        <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                            <div class="col-md-12">
                                                                <input
                                                                    class="custom-option-item-check"
                                                                    type="checkbox"
                                                                    name="elective_courses[]"
                                                                    id="elective_course_{{ $course->id }}"
                                                                    value='{"id":"{{ $course->id }}", "order":"{{ json_decode($order)->order }}"}'
                                                                    checked
                                                                    onclick="this.checked = true"
                                                                />
                                                                <label class="custom-option-item p-1" for="elective_course_{{ $course->id }}">
                                                                    <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else
                                            @foreach($commonOptionalOneCourses as $key => $course)
                                            <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="elective_courses[]"
                                                        id="elective_course_{{ $course->id }}"
                                                        value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                        checked
                                                        onclick="this.checked = true"
                                                    />
                                                    <label class="custom-option-item p-1" for="elective_course_{{ $course->id }}">
                                                    <span class="d-flex justify-content-between flex-wrap mb-50">
                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                    </span>
                                                    </label>                                               
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row custom-options-checkable g-1">
                                <div class="col-md-12 pt-2">
                                    {{ __('Select one option') }} <b>({{ __('mandatory') }})</b>
                                </div>
                                @foreach($commonOptionalTwoCourses as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="common_optional_course"
                                            id="common_optional_course_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('common_optional_course') == $course->id ? 'checked' : ''}}
                                        />
                                        <label class="custom-option-item p-1" for="common_optional_course_{{ $course->id }}">
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
        @include('livewire.enrollment.components.modal')
        @include('layouts.partials.toast', ['message' => __('Great'), 'description' => __('Order updated successfully')])
    </section>
@endsection

@push('scripts')
     <script src='{{ asset('drag-and-drop/draganddrop.js') }}' type='text/javascript'></script>
    <script>// Default Spin
        $(function() {
              $('.list1').sortable({container: '.list1', update: function() {
                    electiveCourse();
                    toast.show();
                }});

            $("#sortable").sortable({
                update: function() {
                    academicCourse();
                    toast.show();
                }
            });
            function academicCourse() {
                $('.row1').each(function(index, element) {
                    document.getElementById("academic_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }

            $("#sortable1").sortable({
                update: function() {
                    appliedCourses();
                    toast.show();
                }
            });
            function appliedCourses() {
                $('.row2').each(function(index, element) {
                    document.getElementById("applied_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable2").sortable({
                update: function() {
                    electiveCourse();
                    toast.show();
                }
            });
            function electiveCourse() {
                $('.row3').each(function(index, element) {
                    document.getElementById("elective_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }

            $("#sortable3").sortable({
                update: function() {
                    freeConfigurationCourses();
                    toast.show();
                }
            });
            function freeConfigurationCourses() {
                $('.row4').each(function(index, element) {
                    document.getElementById("free_configuration_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
        });
    </script>
@endpush
