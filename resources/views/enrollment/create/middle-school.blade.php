@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <style>
        @media screen and (max-width: 480px) {
            .draw-signature-holder, .draw-signature-holdertutor1, .draw-signature-holdertutor2, .text-signature {
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
        <form id="enrollmentForm" class="form form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('enrollment.store') }}">
            @csrf
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Level courses') }}</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row custom-options-checkable g-1">
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
                                                <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
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
                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
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
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Academic courses') }}</h4>
                                <p>{{ __('optional courses info') }}</p>
                            </div>
                            <div class="card-body">
                                <div id="sortable" class="row custom-options-checkable g-1">
                                    @forelse($academicCourses as $key => $course)
                                        <div class="row1" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                            <div class="col-12">
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
                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                    </span>
                                                    <small class="d-block">
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                        </div>
                                                    </small>
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
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Applied courses') }}</h4>
                                <p>{{ __('optional courses info') }}</p>
                            </div>
                            <div class="card-body">
                                <div id="sortable1" class="row custom-options-checkable g-1">
                                    @forelse($appliedCourses as $key => $course)
                                        <div class="row2" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                            <div class="col-12">
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
                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                </span>
                                                    <small class="d-block">
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                        </div>
                                                    </small>
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
            @endif

            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Optional courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div id="sortable2" class="row custom-options-checkable g-1">
                                @forelse($electiveCourses as $key => $course)
                                    <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                        <div class="col-md-12">
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
                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                </span>
                                                <small class="d-block">
                                                    <div class="input-group">
                                                        <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                    </div>
                                                </small>
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
                @if(auth()->user()->student->grade->id == \App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                    <!-- custom option checkbox -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Free configuration courses') }}</h4>
                                <p>{{ __('free configuration courses info') }}</p>
                            </div>
                            <div class="card-body">
                                <div id="sortable3" class="row custom-options-checkable g-1">
                                    @forelse($freeConfigurationCourses as $key => $course)
                                        <div class="row4" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                            <div class="col-12">
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
                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                    </span>
                                                    <small class="d-block">
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                        </div>
                                                    </small>
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
                @endif
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

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>// Default Spin

        $(function() {
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
