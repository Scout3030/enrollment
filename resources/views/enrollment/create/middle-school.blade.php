@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
@endpush
<!-- Modal -->
@push('styles')
  <!-- Signer CSS -->
    <link href="{{ asset('signature/fonts/ionicons/css/ionicons.css') }}" rel="stylesheet">
   
    <link rel="stylesheet" href="{{ asset('signature/css/simcify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('signature/css/style.css') }}">
    <style>

        #draw-canvas {
        border: 2px dotted #CCCCCC;
        border-radius: 5px;
        cursor: crosshair;
        cursor: pointer;
        }

        #draw-dataUrl {
        width: 100%;
        }

    </style>
@endpush
@push('scripts')
    <script src="{{ asset('signature/js/jscolor.js') }}"></script>
    <script src="{{ asset('signature/js/jscolortutor1.js') }}"></script>
     <script src="{{ asset('signature/js/savesignature.js') }}"></script>
@endpush

@section('content')

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">{{ __('Create your enrollment') }}</h2>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <form id="enrollmentForm" class="form form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('enrollment.store') }}">
            @csrf
            @if(!auth()->user()->student->grade_id)
                <div class="row">
                    <!-- custom option checkbox -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Select your level and grade') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="level_id">{{ __('Level/Grade') }}</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <select class="select2 form-select" id="level_id" name="level_id">
                                                    @foreach(\App\Models\Level::get() as $level)
                                                        <option value="{{ $level->id }}">{{ __($level->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <select class="select2 form-select" id="grade_id" name="grade_id"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / basic custom options -->
                </div>
            @endif
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
                                                    <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Academic courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($academicCourses as $key => $course)
                                    <div class="col-md-6">
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
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                            <small class="d-block">
                                                <div class="input-group">
                                                    <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                </div>
                                            </small>
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

                <!-- custom option checkbox -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Applied courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($appliedCourses as $key => $course)
                                    <div class="col-md-6">
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
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                            <small class="d-block">
                                                <div class="input-group">
                                                    <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                </div>
                                            </small>
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
            @endif

            <div class="row">
                <!-- custom option checkbox -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Optional courses') }}</h4>
                            <p>{{ __('optional courses info') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row custom-options-checkable g-1">
                                @forelse($electiveCourses as $key => $course)
                                    <div class="col-md-3">
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
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                            <small class="d-block">
                                                <div class="input-group">
                                                    <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                </div>
                                            </small>
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

            @if(auth()->user()->student->grade->id == \App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                <div class="row">
                    <!-- custom option checkbox -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Free configuration courses') }}</h4>
                                <p>{{ __('free configuration courses info') }}</p>
                            </div>
                            <div class="card-body">
                                <div class="row custom-options-checkable g-1">
                                    @forelse($freeConfigurationCourses as $key => $course)
                                        <div class="col-md-3">
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
                                                <span class="fw-bolder">{{ $course->name.' '.($course->bilingual ? '*' : '') }}</span>
                                            </span>
                                                <small class="d-block">
                                                    <div class="input-group">
                                                        <input type="number" class="touchspin-min-max" value="{{ $key + 1 }}" />
                                                    </div>
                                                </small>
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
            @endif

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
                                            </div>
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
                            <h4 class="card-title">{{ __('Signature student') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="mb-1 row">
                                            <ul class="head-links nav nav-tabs nav-tabs-custom nav-justified">
                                                <li type="capture" class="active nav-item " role="tablist"><a data-toggle="tab" class="nav-link active" aria-selected="true" href="#text">Text</a></li>
                                                <li type="upload" class="nav-item" role="tablist"><a data-toggle="tab" class="nav-link" aria-selected="false" href="#upload">Upload</a></li>
                                                <li type="draw" class="nav-item" role="tablist"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#draw">Draw</a></li>
                                            </ul>
                                            <div>
                                            <div class="tab-content">
                                                    <div id="text" class="tab-pane in active">
                                                            <form>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                        <label>Type your signature</label>
                                                                        <input type="text" class="form-control signature-input" name="" placeholder="Type your signature" maxlength="18" value="{{ __('Signature student') }}">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        <label>Select font</label>
                                                                        <select class="form-control signature-font" name="">
                                                                            <option value="Lato">Lato</option>
                                                                            <option value="Miss Fajardose">Miss Fajardose</option>
                                                                            <option value="Meie Script">Meie Script</option>
                                                                            <option value="Petit Formal Script">Petit Formal Script</option>
                                                                            <option value="Niconne">Niconne</option>
                                                                            <option value="Rochester">Rochester</option>
                                                                            <option value="Tangerine">Tangerine</option>
                                                                            <option value="Great Vibes">Great Vibes</option>
                                                                            <option value="Berkshire Swash">Berkshire Swash</option>
                                                                            <option value="Sacramento">Sacramento</option>
                                                                            <option value="Dr Sugiyama">Dr Sugiyama</option>
                                                                            <option value="League Script">League Script</option>
                                                                            <option value="Courgette">Courgette</option>
                                                                            <option value="Pacifico">Pacifico</option>
                                                                            <option value="Cookie">Cookie</option>
                                                                            <option value="Grand Hotel">Grand Hotel</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                        <label>Weight</label>
                                                                        <select class="form-control signature-weight" name="">
                                                                            <option value="normal">Regular</option>
                                                                            <option value="bold">Bold</option>
                                                                            <option value="lighter">Lighter</option>
                                                                        </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label>Color</label>
                                                                        <input  class="form-control signature-color jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColor(this)'}" readonly="">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label>Style</label>
                                                                        <select class="form-control signature-style" name="">
                                                                            <option value="normal">Regular</option>
                                                                            <option value="italic">Italic</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="divider"></div>
                                                            <h4 class="text-center">Preview</h4>
                                                            <div class="text-signature-preview">
                                                                <div class="text-signature" id="text-signature" style="color: #000000">{{ __('Signature student') }}</div>
                                                            </div>
                                                            <br>
                                                            <div class="row" align="right">
                                                                <div class="col-md-12">
                                                                    <button type="button" id="save-signature" class="btn btn-primary save-signature">{{ __('Signature student') }}</button>
                                                                 </div>
                                                             </div>
                                                    </div>
                                                    <div id="upload" class="tab-pane">
                                                        <p>Upload your signature if you already have it.</p>
                                                        <div class="form-group">
                                                                <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Upload your signature</label>
                                                                        <input type="file" name="signatureupload" class="croppie" width="400" height="150">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row" align="right">
                                                                <div class="col-md-12">
                                                                  <button type="button" id="save-signature" class="btn btn-primary save-signature">{{ __('Signature student') }}</button>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div id="draw" class="tab-pane text-center">
                                                        <p>Draw your signature.</p>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="draw-signature-holder"><canvas width="400" height="150" id="draw-canvasstudent"></canvas></div>
                                                                <div class="signature-tools text-center" id="controls">
                                                                
                                                                    <div class="signature-tool-item" id="draw-clearBtnstudent">
                                                                        <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                                                    </div>
                                                                    <input type="color" id="colorstudent">
                                                                    <label>Tamaño Puntero</label>
                                                                    <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <br>
                                                        <div class="row" align="right">
                                                            <div class="col-md-12">
                                                                <button type="button" id="draw-submitBtnstudent" class="btn btn-primary">{{ __('Signature student') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                </div>
                            </div>
                            <input type="hidden" id="draw-dataUrlstudent" name="student_signature"/>
                        </div>
                    </div>                
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">{{ __('Signature tutor 1') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="demo-inline-spacing">
                                    <div class="modal-content">
                                             <ul class="head-links-tutor1 nav nav-tabs nav-tabs-custom nav-justified">
                                                <li type="capturetutor1" class="active nav-item " role="tablist"><a data-toggle="tab" class="nav-link active" aria-selected="true" href="#texttutor1">Text</a></li>
                                                <li type="uploadtutor1" class="nav-item"><a data-toggle="tab" class="nav-link" aria-selected="false" href="#uploadtutor1">Upload</a></li>
                                                <li type="drawtutor1" class="nav-item"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#drawtutor1">Draw</a></li>
                                            </ul>
                                            <div class="modal-body">
                                            <div class="tab-content">
                                                    <div id="texttutor1" class="tab-pane in active">
                                                            <form>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                        <label>Type your signature</label>
                                                                        <input type="text" class="form-control signature-inputtutor1" name="" placeholder="Type your signature" maxlength="18" value="{{ __('Signature tutor 1') }}">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        <label>Select font</label>
                                                                        <select class="form-control signature-font" name="">
                                                                            <option value="Lato">Lato</option>
                                                                            <option value="Miss Fajardose">Miss Fajardose</option>
                                                                            <option value="Meie Script">Meie Script</option>
                                                                            <option value="Petit Formal Script">Petit Formal Script</option>
                                                                            <option value="Niconne">Niconne</option>
                                                                            <option value="Rochester">Rochester</option>
                                                                            <option value="Tangerine">Tangerine</option>
                                                                            <option value="Great Vibes">Great Vibes</option>
                                                                            <option value="Berkshire Swash">Berkshire Swash</option>
                                                                            <option value="Sacramento">Sacramento</option>
                                                                            <option value="Dr Sugiyama">Dr Sugiyama</option>
                                                                            <option value="League Script">League Script</option>
                                                                            <option value="Courgette">Courgette</option>
                                                                            <option value="Pacifico">Pacifico</option>
                                                                            <option value="Cookie">Cookie</option>
                                                                            <option value="Grand Hotel">Grand Hotel</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                        <label>Weight</label>
                                                                        <select class="form-control signature-weight" name="">
                                                                            <option value="normal">Regular</option>
                                                                            <option value="bold">Bold</option>
                                                                            <option value="lighter">Lighter</option>
                                                                        </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label>Color</label>
                                                                        <input  class="form-control signature-colortutor1 jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColortutor1(this)'}" readonly="">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label>Style</label>
                                                                        <select class="form-control signature-style" name="">
                                                                            <option value="normal">Regular</option>
                                                                            <option value="italic">Italic</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="divider"></div>
                                                            <h4 class="text-center">Preview</h4>
                                                            <div class="text-signature-preview">
                                                                <div class="text-signaturetutor1" id="text-signaturetutor1" style="color: #000000">{{ __('Signature tutor 1') }}</div>
                                                            </div>
                                                            <br>
                                                        <div class="row" align="right">
                                                            <div class="col-md-12">
                                                            <button type="button" id="save-signaturetutor1" class="btn btn-primary save-signaturetutor1">{{ __('Signature tutor 1') }}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div id="uploadtutor1" class="tab-pane">
                                                        <p>Upload your signature if you already have it.</p>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label>Upload your signature</label>
                                                                                <input type="file" name="signatureuploadtutor1" class="croppie" crop-width="400" crop-height="150">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <br>
                                                                    <div class="row" align="right">
                                                                        <div class="col-md-12">
                                                                        <button type="button" id="save-signaturetutor1" class="btn btn-primary save-signaturetutor1">{{ __('Signature tutor 1') }}</button>
                                                                        </div>
                                                                    </div>
                                                         </div>
                                                            <div id="drawtutor1" class="tab-pane text-center">
                                                                    <p>Draw your signature.</p>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="draw-signature-holdertutor1"><canvas width="400" height="150" id="draw-canvastutor1"></canvas></div>
                                                                            <div class="signature-tools text-center" id="controls">
                                                                            
                                                                                <div class="signature-tool-item" id="draw-clearBtntutor1">
                                                                                    <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                                                                </div>
                                                                                <input type="color" id="color">
                                                                                <label>Tamaño Puntero</label>
                                                                                <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        <br>
                                                                    <div class="row" align="right">
                                                                        <div class="col-md-12">
                                                                            <button type="button" id="draw-submitBtntutor1" class="btn btn-primary">{{ __('Signature tutor 1') }}</button>
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
                    </div>
                </div>
                <input type="hidden" id="draw-dataUrltutor1" name="first_tutor_signature"/>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">{{ __('Signature tutor 2') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="demo-inline-spacing">
                                    <div class="modal-content">              
                                     <ul class="head-links-tutor2 nav nav-tabs nav-tabs-custom nav-justified">
                                        <li type="capturetutor2" class="active nav-item " role="tablist"><a data-toggle="tab" class="nav-link active" aria-selected="true" href="#texttutor2">Text</a></li>
                                        <li type="uploadtutor2" class="nav-item"><a data-toggle="tab" class="nav-link" aria-selected="false" href="#uploadtutor2">Upload</a></li>
                                        <li type="drawtutor2" class="nav-item"><a data-toggle="tab"  class="nav-link" aria-selected="false" href="#drawtutor2">Draw</a></li>
                                    </ul>
                                    <div class="modal-body">
                                    <div class="tab-content">
                                            <div id="texttutor2" class="tab-pane in active">
                                                    <form>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <label>Type your signature</label>
                                                                <input type="text" class="form-control signature-inputtutor2" name="" placeholder="Type your signature" maxlength="18" value="{{ __('Signature tutor 2') }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                <label>Select font</label>
                                                                <select class="form-control signature-font" name="">
                                                                    <option value="Lato">Lato</option>
                                                                    <option value="Miss Fajardose">Miss Fajardose</option>
                                                                    <option value="Meie Script">Meie Script</option>
                                                                    <option value="Petit Formal Script">Petit Formal Script</option>
                                                                    <option value="Niconne">Niconne</option>
                                                                    <option value="Rochester">Rochester</option>
                                                                    <option value="Tangerine">Tangerine</option>
                                                                    <option value="Great Vibes">Great Vibes</option>
                                                                    <option value="Berkshire Swash">Berkshire Swash</option>
                                                                    <option value="Sacramento">Sacramento</option>
                                                                    <option value="Dr Sugiyama">Dr Sugiyama</option>
                                                                    <option value="League Script">League Script</option>
                                                                    <option value="Courgette">Courgette</option>
                                                                    <option value="Pacifico">Pacifico</option>
                                                                    <option value="Cookie">Cookie</option>
                                                                    <option value="Grand Hotel">Grand Hotel</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                <label>Weight</label>
                                                                <select class="form-control signature-weight" name="">
                                                                    <option value="normal">Regular</option>
                                                                    <option value="bold">Bold</option>
                                                                    <option value="lighter">Lighter</option>
                                                                </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                <label>Color</label>
                                                                <input  class="form-control signature-colortutor2 jscolor { valueElement:null,borderRadius:'1px', borderColor:'#e6eaee',value:'000000',zIndex:'99999', onFineChange:'updateSignatureColortutor2(this)'}" readonly="">
                                                                </div>
                                                                <div class="col-md-4">
                                                                <label>Style</label>
                                                                <select class="form-control signature-style" name="">
                                                                    <option value="normal">Regular</option>
                                                                    <option value="italic">Italic</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="divider"></div>
                                                    <h4 class="text-center">Preview</h4>
                                                    <div class="text-signature-preview">
                                                        <div class="text-signaturetutor2" id="text-signaturetutor2" style="color: #000000">{{ __('Signature tutor 2') }}</div>
                                                    </div>
                                                    <br>
                                                <div class="row" align="right">
                                                    <div class="col-md-12">
                                                    <button type="button" id="save-signaturetutor2" class="btn btn-primary save-signaturetutor2">{{ __('Signature tutor 2') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div id="uploadtutor2" class="tab-pane">
                                                <p>Upload your signature if you already have it.</p>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Upload your signature</label>
                                                                        <input type="file" name="signatureuploadtutor2" class="croppie" crop-width="400" crop-height="150">
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <br>
                                                            <div class="row" align="right">
                                                                <div class="col-md-12">
                                                                <button type="button" id="save-signaturetutor2" class="btn btn-primary save-signaturetutor2">{{ __('Signature tutor 2') }}</button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div id="drawtutor2" class="tab-pane text-center">
                                                            <p>Draw your signature.</p>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="draw-signature-holdertutor2"><canvas width="400" height="150" id="draw-canvastutor2"></canvas></div>
                                                                    <div class="signature-tools text-center" id="controls">
                                                                    
                                                                        <div class="signature-tool-item" id="draw-clearBtntutor2">
                                                                            <i class="tool-icon tool-erase" aria-hidden="true"></i>
                                                                        </div>
                                                                        <input type="color" id="colortutor2">
                                                                        <label>Tamaño Puntero</label>
                                                                        <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <br>
                                                            <div class="row" align="right">
                                                                <div class="col-md-12">
                                                                    <button type="button" id="draw-submitBtntutor2" class="btn btn-primary">{{ __('Signature tutor 2') }}</button>
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
                    </div>
                </div>
                <input type="hidden" id="draw-dataUrltutor2" name="second_tutor_signature"/>
            </div>
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
    <script>// Default Spin
        $('.touchspin').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',
            buttondown_txt: feather.icons['minus'].toSvg(),
            buttonup_txt: feather.icons['plus'].toSvg()
        });

        // Icon Change
        $('.touchspin-icon').TouchSpin({
            buttondown_txt: feather.icons['chevron-down'].toSvg(),
            buttonup_txt: feather.icons['chevron-up'].toSvg()
        });

        // Min - Max
        var touchspinValue = $('.touchspin-min-max'),
            counterMin = 1,
            counterMax = {{ count($electiveCourses) }};
        if (touchspinValue.length > 0) {
            touchspinValue
                .TouchSpin({
                    min: counterMin,
                    max: counterMax,
                    buttondown_txt: feather.icons['minus'].toSvg(),
                    buttonup_txt: feather.icons['plus'].toSvg()
                })
                .on('touchspin.on.startdownspin', function () {
                    var $this = $(this);
                    $('.bootstrap-touchspin-up').removeClass('disabled-max-min');
                    let node = $this.parent().parent().parent().parent().find('input.custom-option-item-check')
                    let val = JSON.parse($(node).val())
                    val.order = $this.val()
                    $(node).val(JSON.stringify(val))
                    if ($this.val() == counterMin) {
                        $(this).siblings().find('.bootstrap-touchspin-down').addClass('disabled-max-min');
                    }
                })
                .on('touchspin.on.startupspin', function () {
                    var $this = $(this);
                    $('.bootstrap-touchspin-down').removeClass('disabled-max-min');
                    let node = $this.parent().parent().parent().parent().find('input.custom-option-item-check')
                    let val = JSON.parse($(node).val())
                    val.order = $this.val()
                    $(node).val(JSON.stringify(val))
                    if ($this.val() == counterMax) {
                        $(this).siblings().find('.bootstrap-touchspin-up').addClass('disabled-max-min');
                    }
                });
        }
    </script>
    <script src="{{ asset('signature/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('signature/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('signature/libs/html2canvas/html2canvas.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/jcanvas.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signaturetutor1.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signaturetutor2.min.js') }}"></script>
    <script src="{{ asset('signature/libs/jcanvas/signaturestudent.min.js') }}"></script>
    <script src="{{ asset('signature/js/simcify.min.js') }}"></script>
    <script src="{{ asset('signature/js/app.js')}}"></script>
   <script>
   function saveSignature(signature, singData){
         $.ajax({
            url: `{{ route('enrollment.signature') }}`,
            type: 'post',
        
            headers: {
                'x-csrf-token': $("meta[name=csrf-token]").attr('content')
            },
            data:{sign:signature},  
            error: function(data, textStatus, xhr) {
                
                toastr.error(`{{ __('error, signature no register') }}`)
            },               
            success: (data, textStatus, xhr) => {
                if(xhr.status === 200) {
                    if(singData=='drawtutor1' || singData =='uploadtutor1' || singData == 'capturetutor1'){
                    $("#draw-dataUrltutor1").val(data.name).val();
                    }
                    if(singData=='drawtutor2' || singData =='uploadtutor2' || singData == 'capturetutor2'){
                    $("#draw-dataUrltutor2").val(data.name).val();
                    }
                    if(singData=='draw' || singData =='upload' || singData == 'capture'){
                    $("#draw-dataUrlstudent").val(data.name).val();
                    }
                    toastr.success(data.status)                   
                }                
            }
        })
    }
   </script> 
  @endpush