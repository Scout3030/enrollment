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
                            <h4 class="card-title">{{ __('Core plural') }} {{  __('mandatory') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($commonCoursesCore as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="core_course"
                                            id="core_course_{{ $course->id }}"
                                            checked
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="core_course_{{ $course->id }}">
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
                            <h4 class="card-title">{{ __('Specific female plural') }} ({{ __('select one') }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @foreach($commonCoursesSpecific as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="common_courses"
                                            id="common_course_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('common_courses') == $course->id ? 'checked' : ''}}
                                        />
                                        <label class="custom-option-item p-1" for="common_course_{{ $course->id }}">
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
                                            <label class="form-check-label" for="active_si">{{ __('ACADEMIC TEACHINGS FOR BACCALAUREATE INITIATION') }}</label>
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
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline" onclick="activeOption()">
                                                    <input
                                                        class="form-check-input  active_1"
                                                        type="radio"
                                                        name="active_option"
                                                        id="active_option_1"
                                                        value="1"
                                                        {{ old('active_option') == "1" ? 'checked' : ''}}
                                                    />
                                                    <label class="form-check-label" for="active_option_1">{{ __('Option 1') }}</label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row custom-options-checkable g-1">
                                                    @forelse($coursesItineraryA as $course)
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
                                                    @empty
                                                        {{ __('Select level and grade') }}
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-12">
                                <div class="card">
                                    <div class="mb-1 row">
                                        <div class="col-sm-10">
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline" onclick="activeOption()">
                                                    <input
                                                        class="form-check-input active_1"
                                                        type="radio"
                                                        name="active_option"
                                                        id="active_option_2"
                                                        value="0"
                                                        {{ old('active_option') == "0" ? 'checked' : ''}}
                                                    />
                                                    <label class="form-check-label" for="active_option_2">{{ __('Option 2') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row custom-options-checkable g-1">
                                            @forelse($coursesItineraryB as $course)
                                                <div class="row2" course_id="{{ $course->id }}">
                                                    <div class="col-md-12">
                                                        <input
                                                            class="custom-option-item-check"
                                                            type="checkbox"
                                                            name="core_itinerary_b"
                                                            id="core_itinerary_b_{{ $course->id }}"
                                                            checked
                                                            disabled
                                                        />
                                                        <label class="custom-option-item p-1" for="core_itinerary_b_{{ $course->id }}">
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
                                            <label class="form-check-label" for="active_no">{{ __('TEACHINGS APPLIED TO THE INITIATION TO THE VET') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row custom-options-checkable g-1">
                                        @forelse($coursesItineraryC as $course)
                                            <div class="row3" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="core_itinerary_c"
                                                        id="core_itinerary_c_{{ $course->id }}"
                                                        checked
                                                        disabled
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
                                    <div class="row custom-options-checkable g-1">
                                        <div class="col-md-12 pt-2">
                                            {{ __('Select one option') }} <b>{{ __('mandatory') }}</b>
                                        </div>
                                        @foreach($coursesItineraryD as $course)
                                            <div class="row4" course_id="{{ $course->id }}">
                                                <div class="col-md-6">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="radio"
                                                        name="core_itinerary_d"
                                                        id="core_itinerary_d_{{ $course->id }}"
                                                        value="{{ $course->id }}"
                                                        {{ old('core_itinerary_d') == $course->id ? 'checked' : ''}}
                                                    />
                                                    <label class="custom-option-item p-1" for="core_itinerary_d_{{ $course->id }}">
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
                <!-- / basic custom options -->
            </div>
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Specific female plural') }}  ({{ __('Order by preference') }})</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 col-md-1">
                                    <div class="card mb-4">
                                        <ul class="list-group list-group-flush">
                                            @foreach($coursesSpecific as $course)
                                                <li class="list-group-item numerator">
                                                    <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-10 col-md-11">
                                    <div id="sortable5" class="row custom-options-checkable g-1">
                                        @if(old('elective_courses'))
                                            @foreach(old('elective_courses') as $order)
                                                @foreach($coursesSpecific as $key => $course)
                                                    @if(json_decode($order)->id == $course->id)
                                                        <div class="row5" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
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
                                            @foreach($coursesSpecific as $key => $course)
                                            <div class="row5" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
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
                                            </div>
                                            @endforeach
                                        @endif
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
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Free configuration') }} ({{ __('Order by preference') }})</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 col-md-1">
                                    <div class="card mb-4">
                                        <ul class="list-group list-group-flush">
                                            @foreach($coursesfree as $course)
                                                <li class="list-group-item numerator">
                                                    <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                </li>
                                            @endforeach
                                            <li class="list-group-item numerator">
                                                <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $coursesfree->count() + 1 }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-10 col-md-11">
                                    <div id="sortable6" class="row custom-options-checkable g-1">
                                        @if(old('elective_courses_free'))
                                            @foreach(old('elective_courses_free') as $order)
                                                @foreach($coursesfree as $key => $course)
                                                    @if(json_decode($order)->id == $course->id)
                                                        <div class="row6" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                            <div class="col-md-12">
                                                                <input
                                                                    class="custom-option-item-check"
                                                                    type="checkbox"
                                                                    name="elective_courses_free[]"
                                                                    id="elective_course_free_{{ $course->id }}"
                                                                    value='{"id":"{{ $course->id }}", "order":"{{ json_decode($order)->order }}"}'
                                                                    checked
                                                                    onclick="this.checked = true"
                                                                />
                                                                <label class="custom-option-item p-1" for="elective_course_free_{{ $course->id }}">
                                                                    <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if(json_decode($order)->id == "0")
                                                    @once
                                                    <div class="row6" order="{{ json_decode($order)->order }}" course_id="0">
                                                        <label for="">{{ __('Other specific subject of the previous block') }}</label>
                                                        <div class="col-md-12">
                                                            <input
                                                                type="text"
                                                                id="free_info"
                                                                class="form-control"
                                                                name="free_info"
                                                                value="{{ old('free_info') }}"
                                                                placeholder="{{ __('Type...') }}"
                                                                autocomplete="off"
                                                            />
                                                            <input
                                                                id="elective_course_free_0"
                                                                type="hidden"
                                                                name="elective_courses_free[]"
                                                                value='{"id":"0", "order":"{{ $coursesfree->count() + 1 }}"}'
                                                            >
                                                        </div>
                                                    </div>
                                                    @endonce
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else
                                            @foreach($coursesfree as $key => $course)
                                            <div class="row6" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                <div class="col-md-12">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="elective_courses_free[]"
                                                        id="elective_course_free_{{ $course->id }}"
                                                        value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                                        checked
                                                        onclick="this.checked = true"
                                                    />
                                                    <label class="custom-option-item p-1" for="elective_course_free_{{ $course->id }}">
                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                            <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="row6" order="{{ $coursesfree->count() + 1 }}" course_id="0">
                                                <label for="">{{ __('Other specific subject of the previous block') }}</label>
                                                <div class="col-md-12">
                                                    <input
                                                        type="text"
                                                        id="free_info"
                                                        class="form-control"
                                                        name="free_info"
                                                        value="{{ old('free_info') }}"
                                                        placeholder="{{ __('Type...') }}"
                                                    />
                                                    <input
                                                        id="elective_course_free_0"
                                                        type="hidden"
                                                        name="elective_courses_free[]"
                                                        value='{"id":"0", "order":"{{ $coursesfree->count() + 1 }}"}'
                                                    >
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
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

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>// Default Spin
        document.getElementById("active_option_1").disabled = true;
        document.getElementById("active_option_2").disabled = true;
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
            document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).disabled = true;
        });

        function activeOption(){
            if($('input:radio[name=active]:checked').val()==1){
                if($('input:radio[name=active_option]:checked').val()==1){
                    $('.row1').each(function(index, element) {
                        document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = true;
                    });
                    $('.row2').each(function(index, element) {
                        document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = false;
                    });
                } else {
                    $('.row2').each(function(index, element) {
                        document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = true;
                    });
                    $('.row1').each(function(index, element) {
                        document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
                    });
                }
            }
        }
        function active(){
            if($('input:radio[name=active]:checked').val()==1){
                document.getElementById("active_option_1").disabled = false;
                document.getElementById("active_option_2").disabled = false;
                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = false;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = false;
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).disabled = true;
                });
            }else{
                document.getElementById("active_option_1").disabled = true;
                document.getElementById("active_option_2").disabled = true;
                document.getElementById("active_option_1").checked = false;
                document.getElementById("active_option_2").checked = false;
                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = true;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = true;
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).disabled = false;
                });
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
                });
                $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = false;
                });
            }
        }
        $(function() {
            $("#sortable5").sortable({
                update: function() {
                    hour4Course();
                    toast.show();
                }
            });
            function hour4Course() {
                $('.row5').each(function(index, element) {
                    document.getElementById("elective_course_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
                });
            }
            $("#sortable6").sortable({
                update: function() {
                    hour3Course();
                    toast.show();
                }
            });
            function hour3Course() {
                $('.row6').each(function(index, element) {
                    document.getElementById("elective_course_free_"+$(this).attr('course_id')).value = "{"+'"id"'+":"+'"'+$(this).attr('course_id')+'", '+'"order":'+'"'+(index + 1)+'"'+"}"
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

