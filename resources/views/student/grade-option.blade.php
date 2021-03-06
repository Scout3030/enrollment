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
    </style>
@endpush

@section('title', __('Create your enrollment'))

@section('content')

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST"  action="{{ route('students.update-grade') }}">
            @csrf
            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Grades') }}</h4>
                           
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                <div class="col-md-12 pt-2">
                                    {{ __('Select one option') }} <b>({{ __('mandatory') }})</b>
                                </div>
                                 <h4 class="card-title">{{ __('ESO') }}</h4>
                                @foreach($gradesEso as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="grade_id"
                                            id="grade_id_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('grade_id') == $course->id ? 'checked' : ''}}
                                        />
                                        <label class="custom-option-item p-1" for="grade_id_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->level->name).' '.$course->name }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                                 <h4 class="card-title">{{ __('PMAR') }}</h4>
                                @foreach($gradesPmar as $course)
                                @if( $course->id == App\Models\Grade::SECOND_HIGH_SCHOOL || $course->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="grade_id"
                                            id="grade_id_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('grade_id') == $course->id ? 'checked' : ''}}
                                        />
                                        <label class="custom-option-item p-1" for="grade_id_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{$course->name }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endif
                                @endforeach
                                 <h4 class="card-title">{{ __('BACHELOR') }}</h4>
                                @foreach($gradesBachelor as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="grade_id"
                                            id="grade_id_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('grade_id') == $course->id ? 'checked' : ''}}
                                        />
                                        <label class="custom-option-item p-1" for="grade_id_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->level->name).' '.$course->name }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                                <h4 class="card-title">{{ __('EDUCATIONAL_CYCLE') }}</h4>
                                @foreach($gradesCycle as $course)
                                    <div class="col-md-3">
                                        <input
                                            class="custom-option-item-check"
                                            type="radio"
                                            name="grade_id"
                                            id="grade_id_{{ $course->id }}"
                                            value="{{ $course->id }}"
                                            {{ old('grade_id') == $course->id ? 'checked' : ''}}
                                        />
                                        <label class="custom-option-item p-1" for="grade_id_{{ $course->id }}">
                                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                                <span class="fw-bolder">{{ __($course->level->name).' '.$course->name }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
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
                                        type="submit"
                                        class="btn btn-outline-primary"
                                    >{{ __('Continue') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('vendor-scripts')
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
   
@endpush

