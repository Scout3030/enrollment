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
        <form id="enrollmentForm" class="form form-horizontal" method="POST" action="{{ route('enrollment.store') }}">
            @csrf
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Core plural') }} ({{ __('mandatory') }})</h4>
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
                            <h4 class="card-title">{{ __('Core modality') }} ({{ __('select one option') }})</h4>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active11()">
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
                                                        name="modaly_course1[]"
                                                        id="modaly_course1_{{ $course->id }}"
                                                        disabled
                                                        checked
                                                    />
                                                    <label class="custom-option-item p-1" for="modaly_course1_{{ $course->id }}">
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
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active12()">
                                            <input
                                                class="form-check-input  active_1"
                                                type="radio"
                                                name="active1"
                                                id="active_option_2"
                                                value="2"
                                                {{ old('active1') == "2" ? 'checked' : ''}}
                                            />
                                            <label class="form-check-label" for="active_option_2">{{ __('Option 2') }}</label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row custom-options-checkable g-1">
                                            @foreach($modalitiesCourses2 as $course)
                                                <div class="row-md-3">
                                                    <input
                                                        class="custom-option-item-check"
                                                        type="checkbox"
                                                        name="modaly_course2[]"
                                                        id="modaly_course2_{{ $course->id }}"
                                                        disabled
                                                        checked
                                                    />
                                                    <label class="custom-option-item p-1" for="modaly_course2_{{ $course->id }}">
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
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active13()">
                                            <input
                                                class="form-check-input  active_1"
                                                type="radio"
                                                name="active1"
                                                id="active_option_3"
                                                value="2"
                                                {{ old('active1') == "3" ? 'checked' : ''}}
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
                                                        name="modaly_course3[]"
                                                        id="modaly_course3_{{ $course->id }}"
                                                        checked
                                                        disabled
                                                    />
                                                    <label class="custom-option-item p-1" for="modaly_course3_{{ $course->id }}">
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
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active14()">
                                            <input
                                                class="form-check-input  active_1"
                                                type="radio"
                                                name="active1"
                                                id="active_option_4"
                                                value="4"
                                                {{ old('active1') == "4" ? 'checked' : ''}}
                                            />
                                            <label class="form-check-label" for="active_option_4">{{ __('Option 4') }}</label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row custom-options-checkable g-1">
                                            @forelse($modalitiesCourses4 as $course)
                                                <div class="row-md-3">
                                                    <input
                                                        class="custom-option-item-check myClass"
                                                        type="checkbox"
                                                        name="modaly_course4[]"
                                                        id="modaly_course4_{{ $course->id }}"
                                                        checked
                                                        disabled
                                                    />
                                                    <label class="custom-option-item p-1" for="modaly_course4_{{ $course->id }}">
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
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-check form-check-inline" onclick="active15()">
                                            <input
                                                class="form-check-input  active_1"
                                                type="radio"
                                                name="active1"
                                                id="active_option_5"
                                                value="5"
                                                {{ old('active1') == "5" ? 'checked' : ''}}
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
                                                        name="modaly_course5[]"
                                                        id="modaly_course5_{{ $course->id }}"
                                                        checked
                                                        disabled
                                                    />
                                                    <label class="custom-option-item p-1" for="modaly_course5_{{ $course->id }}">
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
                            <h4 class="card-title">{{ __('Specific and free configuration') }}</h4>
                            <p>{{ __('Ordena según preferencia, se seleccionará uno o dos cursos que completen 4H.') }}</p>
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
                                            <label class="form-check-label" for="active_si">{{ __('MODALITY SUBJECTS NOT STUDIED') }} <b>({{ __('Order by preference') }})</b></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 col-md-1 phoneContent">
                                        <div class="card mb-4  ">
                                            <ul class="list-group list-group-flush">
                                                @foreach($coursesItineraryB as $course)
                                                    <li class="list-group-item numerator">
                                                    <p>  <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-1 deskContent">
                                        <div class="card mb-4  ">
                                            <ul class="list-group list-group-flush">
                                                @foreach($coursesItineraryB as $course)
                                                    <li class="list-group-item numerator">
                                                        <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                <div class="col-10 col-md-11">
                                    <div id="sortable5" class="row list5 custom-options-checkable g-1">
                                        @if(old('core_itinerary_a'))
                                            @foreach(old('core_itinerary_a') as $order)
                                                @foreach($coursesItineraryB as $key => $course)
                                                    @if(json_decode($order)->id == $course->id)
                                                        <div class="row1" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                                <input
                                                                    class="custom-option-item-check"
                                                                    type="checkbox"
                                                                    name="core_itinerary_a[]"
                                                                    id="core_itinerary_a_{{ $course->id }}"
                                                                    value='{"id":"{{ $course->id }}", "order":"{{ json_decode($order)->order }}"}'
                                                                    checked
                                                                    onclick="this.checked = true"
                                                                />
                                                                <label class="custom-option-item p-1" for="core_itinerary_a_{{ $course->id }}">
                                                                    <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                        <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                    </span>
                                                                </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else
                                        @foreach($coursesItineraryB as $key => $course)
                                            <div class="row1" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
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
                                                                <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                            </span>
                                                    </label>
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
                                            <label class="form-check-label" for="active_no">{{ __('COURSES THE 3 h') }} <b>({{ __('Order by preference') }})</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 col-md-1 phoneContent">
                                        <div class="card mb-4  ">
                                            <ul class="list-group list-group-flush">
                                                @foreach($coursesItineraryC as $course)
                                                    <li class="list-group-item numerator">
                                                    <p>  <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-1 deskContent">
                                        <div class="card mb-4  ">
                                            <ul class="list-group list-group-flush">
                                                @foreach($coursesItineraryC as $course)
                                                    <li class="list-group-item numerator">
                                                        <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                        <div class="col-10 col-md-11">
                                            <div id="sortable6" class="row list6 custom-options-checkable g-1">
                                                @if(old('core_itinerary_b'))
                                                    @foreach(old('core_itinerary_b') as $order)
                                                        @foreach($coursesItineraryC as $key => $course)
                                                            @if(json_decode($order)->id == $course->id)
                                                                <div class="row2" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                                        <input
                                                                            class="custom-option-item-check"
                                                                            type="checkbox"
                                                                            name="core_itinerary_b[]"
                                                                            id="core_itinerary_b_{{ $course->id }}"
                                                                            value='{"id":"{{ $course->id }}", "order":"{{ json_decode($order)->order }}"}'
                                                                            checked
                                                                            onclick="this.checked = true"
                                                                        />
                                                                        <label class="custom-option-item p-1" for="core_itinerary_b_{{ $course->id }}">
                                                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                                <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                            </span>
                                                                        </label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                @foreach($coursesItineraryC as $key => $course)
                                                    <div class="row2" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
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
                                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                </span>
                                                            </label>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-header">
                                        <h5>{{ __('COURSES THE 1 h') }} <b>({{ __('Order by preference') }})</b></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 col-md-1">
                                            <div class="col-2 col-md-1 phoneContent">
                                        <div class="card mb-4  ">
                                            <ul class="list-group list-group-flush">
                                                @foreach($coursesItineraryD as $course)
                                                    <li class="list-group-item numerator">
                                                    <p>  <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-1 deskContent">
                                        <div class="card mb-4  ">
                                            <ul class="list-group list-group-flush">
                                                @foreach($coursesItineraryD as $course)
                                                    <li class="list-group-item numerator">
                                                        <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                        </div>
                                        <div class="col-10 col-md-11">
                                            <div id="sortable4" class="row list4 custom-options-checkable g-1">
                                                @if(old('core_itinerary_c'))
                                                    @foreach(old('core_itinerary_c') as $order)
                                                        @foreach($coursesItineraryD as $key => $course)
                                                            @if(json_decode($order)->id == $course->id)
                                                                <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                                                        <input
                                                                            class="custom-option-item-check"
                                                                            type="checkbox"
                                                                            name="core_itinerary_c[]"
                                                                            id="core_itinerary_c_{{ $course->id }}"
                                                                            value='{"id":"{{ $course->id }}", "order":"{{ json_decode($order)->order }}"}'
                                                                            checked
                                                                            onclick="this.checked = true"
                                                                        />
                                                                        <label class="custom-option-item p-1" for="core_itinerary_c_{{ $course->id }}">
                                                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                                                <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                            </span>
                                                                        </label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                @foreach($coursesItineraryD as $key => $course)
                                                    <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
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
                                                                    <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                                </span>
                                                            </label>
                                                    </div>
                                                    @endforeach
                                                @endif
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
    <script src='{{ asset('drag-and-drop/draganddrop.js') }}' type='text/javascript'></script>
    <script>// Default Spin
        var allChkBox4 = document.getElementsByName('modaly_course4[]');
        for(var i =0, len = allChkBox4.length; i < len; i++) {
            allChkBox4[i].checked = false;
        }
        var allChkBox5 = document.getElementsByName('modaly_course5[]');
        for(var i =0, len = allChkBox5.length; i < len; i++) {
            allChkBox5[i].checked = false;
        }
        var allChkBox3 = document.getElementsByName('modaly_course3[]');
        for(var i =0, len = allChkBox3.length; i < len; i++) {
            allChkBox3[i].checked = false;
        }
        var allChkBox2 = document.getElementsByName('modaly_course2[]');
        for(var i =0, len = allChkBox2.length; i < len; i++) {
            allChkBox2[i].checked = false;
        }
        var allChkBox1 = document.getElementsByName('modaly_course1[]');
        for(var i =0, len = allChkBox1.length; i < len; i++) {
            allChkBox1[i].checked = false;
        }

        $('.row51').each(function(index, element) {
            document.getElementById("modaly_course1_"+$(this).attr('course_id')).checked = false;
        });
        $('.row1').each(function(index, element) {
            document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
            document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).disabled = true;
        });
        $('.row2').each(function(index, element) {
            document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = false;
            document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).disabled = true;
        });
        $('.row3').each(function(index, element) {
            document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = false;
            document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).disabled = true;
        });
        $('.row4').each(function(index, element) {
            document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = false;
        });
        document.getElementById('sortable5').style.pointerEvents = 'none';
        document.getElementById('sortable6').style.pointerEvents = 'none';
        document.getElementById('sortable4').style.pointerEvents = 'none';

        @if(old('active1') && old('active1') == '1')
        $("#active_option_{{ old('active1') }}").prop("checked", true);
        active11()
        @endif

        @if(old('active1') && old('active1') == '2')
        $("#active_option_{{ old('active1') }}").prop("checked", true);
        active12()
        @endif

        @if(old('active1') && old('active1') == '3')
        $("#active_option_{{ old('active1') }}").prop("checked", true);
        active13()
        @endif

        @if(old('active1') && old('active1') == '4')
        $("#active_option_{{ old('active1') }}").prop("checked", true);
        active14()
        @endif

        @if(old('active1') && old('active1') == '5')
        $("#active_option_{{ old('active1') }}").prop("checked", true);
        active15()
        @endif

        @if(!is_null(old('active')))
        active()
        @endif

        @if(!is_null(old('active_option')))
        activeOption()
        @endif

        function active11(){
            for(var i =0, len = allChkBox1.length; i < len; i++) {
            allChkBox1[i].checked = true;
            }
            for(var i =0, len = allChkBox4.length; i < len; i++) {
            allChkBox4[i].checked = false;
            }
            for(var i =0, len = allChkBox5.length; i < len; i++) {
            allChkBox5[i].checked = false;
            }
            for(var i =0, len = allChkBox3.length; i < len; i++) {
            allChkBox3[i].checked = false;
            }
            for(var i =0, len = allChkBox2.length; i < len; i++) {
            allChkBox2[i].checked = false;
            }
        }

        function active12(){
            for(var i =0, len = allChkBox1.length; i < len; i++) {
            allChkBox1[i].checked = false;
            }
            for(var i =0, len = allChkBox4.length; i < len; i++) {
            allChkBox4[i].checked = false;
            }
            for(var i =0, len = allChkBox5.length; i < len; i++) {
            allChkBox5[i].checked = false;
            }
            for(var i =0, len = allChkBox3.length; i < len; i++) {
            allChkBox3[i].checked = false;
            }
            for(var i =0, len = allChkBox2.length; i < len; i++) {
            allChkBox2[i].checked = true;
            }
        }

        function active13(){
            for(var i =0, len = allChkBox1.length; i < len; i++) {
            allChkBox1[i].checked = false;
            }
            for(var i =0, len = allChkBox4.length; i < len; i++) {
            allChkBox4[i].checked = false;
            }
            for(var i =0, len = allChkBox5.length; i < len; i++) {
            allChkBox5[i].checked = false;
            }
            for(var i =0, len = allChkBox3.length; i < len; i++) {
            allChkBox3[i].checked = true;
            }
            for(var i =0, len = allChkBox2.length; i < len; i++) {
            allChkBox2[i].checked = false;
            }
        }

        function active14(){
            for(var i =0, len = allChkBox1.length; i < len; i++) {
            allChkBox1[i].checked = false;
            }
            for(var i =0, len = allChkBox4.length; i < len; i++) {
            allChkBox4[i].checked = true;
            }
            for(var i =0, len = allChkBox5.length; i < len; i++) {
            allChkBox5[i].checked = false;
            }
            for(var i =0, len = allChkBox3.length; i < len; i++) {
            allChkBox3[i].checked = false;
            }
            for(var i =0, len = allChkBox2.length; i < len; i++) {
            allChkBox2[i].checked = false;
            }
        }

        function active15(){
            for(var i =0, len = allChkBox1.length; i < len; i++) {
            allChkBox1[i].checked = false;
            }
            for(var i =0, len = allChkBox4.length; i < len; i++) {
            allChkBox4[i].checked = false;
            }
            for(var i =0, len = allChkBox5.length; i < len; i++) {
            allChkBox5[i].checked = true;
            }
            for(var i =0, len = allChkBox3.length; i < len; i++) {
            allChkBox3[i].checked = false;
            }
            for(var i =0, len = allChkBox2.length; i < len; i++) {
            allChkBox2[i].checked = false;
            }
        }

        function active(){
            if($('input:radio[name=active]:checked').val()==1){
                  $( "#sortable5" ).sortable();
                document.getElementById('sortable5').style.pointerEvents = 'auto';
                document.getElementById('sortable6').style.pointerEvents = 'none';
                document.getElementById('sortable4').style.pointerEvents = 'none';

                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = false;
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).disabled = true;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = false;

                });
                $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = false;
                     document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).disabled = true;
                });
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = true;
                     document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).disabled = false;
                });
            }else{
                document.getElementById('sortable5').style.pointerEvents = 'none';
                document.getElementById('sortable6').style.pointerEvents = 'auto';
                document.getElementById('sortable4').style.pointerEvents = 'auto';

                $('.row3').each(function(index, element) {
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).checked = true;
                    document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).disabled = false;
                });
                $('.row4').each(function(index, element) {
                    document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = true;
                });
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).disabled = true;
                });
                $('.row2').each(function(index, element) {
                    document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).checked = true;
                     document.getElementById("core_itinerary_b_"+$(this).attr('course_id')).disabled = false;
                });
            }
        }
        $(function() {
            $('.list5').sortable({container: '.list5', update: function() {
                hour4Coue();
                toast.show();
            }});
            $('.list6').sortable({container: '.list6', update: function() {
                hour3Ce();
                toast.show();
            }});
            $('.list4').sortable({container: '.list4', update: function() {
                hour4Course();
                toast.show();
            }});
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
    </script>
@endpush

