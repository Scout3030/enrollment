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
         div.space {
            line-height: 55px;
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
                            <h4 class="card-title">{{ __('Common courses') }}</h4>
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
                            <h4 class="card-title">{{ __('Modality courses') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($modalitiesCourses as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="modaly_course"
                                            id="modaly_course_{{ $course->id }}"
                                            checked
                                            disabled
                                        />
                                        <label class="custom-option-item p-1" for="modaly_course_{{ $course->id }}">
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
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Select two options') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @foreach($modalityOption as $course)
                                    <div class="col-md-3">
                                        <input
                                            onclick="check()"
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="one_courses[]"
                                            id="one_courses_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('one_courses') && in_array($course->id, old('one_courses'))  ? 'checked' : ''}}
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
                                            @foreach($coursesItineraryA as $course)
                                                <li class="list-group-item numerator">
                                                    <div class="space">
                                               <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-2 col-md-1 deskContent">
                                    <div class="card mb-4  ">
                                        <ul class="list-group list-group-flush">
                                            @foreach($coursesItineraryA as $course)
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
                                                @foreach($coursesItineraryA as $key => $course)
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
                                            @foreach($coursesItineraryA as $key => $course)
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
                                        <div class="col-2 col-md-1">
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
                                        </div>
                                        <div class="col-10 col-md-11">
                                            <div id="sortable6" class=" list6 row custom-options-checkable g-1">
                                                @if(old('core_itinerary_b'))
                                                    @foreach(old('core_itinerary_b') as $order)
                                                        @foreach($coursesItineraryB as $key => $course)
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
                                                    @foreach($coursesItineraryB as $key => $course)
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
                                        <div class="card-header">
                                            <h5>{{ __('COURSES THE 1 h') }} <b>({{ __('Order by preference') }})</b></h5>
                                        </div>
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
                                                <div id="sortable4" class="row list4 custom-options-checkable g-1">
                                                    @if(old('core_itinerary_c'))
                                                        @foreach(old('core_itinerary_c') as $order)
                                                            @foreach($coursesItineraryC as $key => $course)
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
                                                        @foreach($coursesItineraryC as $key => $course)
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
        $(document).ready(function() {
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
                document.getElementById("core_itinerary_c_"+$(this).attr('course_id')).disabled  = true;
            });
            $('.row4').each(function(index, element) {
                document.getElementById("core_itinerary_d_"+$(this).attr('course_id')).checked = false;
            });
            document.getElementById('sortable5').style.pointerEvents = 'none';
            document.getElementById('sortable6').style.pointerEvents = 'none';
            document.getElementById('sortable4').style.pointerEvents = 'none';

            @if(!is_null(old('active')))
            active()
            @endif

            @if(!is_null(old('active_option')))
            activeOption()
            @endif
        })

        function check(){
            var i=0;
            $("input[name='one_courses[]']").each(function(index, element) {
                if ($(this).prop('checked') ) {
                    i++
                }

                if(i>2){
                    document.getElementById($(this).prop('id')).checked = false;
                }
            });
        }

        function active(){
            if($('input:radio[name=active]:checked').val()==1){
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
                $('.row1').each(function(index, element) {
                    document.getElementById("core_itinerary_a_"+$(this).attr('course_id')).checked = false;
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

