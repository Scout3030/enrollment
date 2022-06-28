@extends('layouts.app')

@section('title')
    {{ $academicPeriod->id ? __('Edit academic period') : __('Create an academic period') }}
@endsection

@push('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endpush

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $academicPeriod->id ? __('Edit academic period') : __('Add academic period') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal"
                              method="POST"
                              action="{{ $academicPeriod->id ? route('academic-periods.update', $academicPeriod) : route('academic-periods.store') }}"
                        >
                            @if($academicPeriod->id)
                                @method('put')
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="name">{{ __('Name') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control"
                                                name="name"
                                                placeholder="{{__('Name')}}"
                                                value="{{ $academicPeriod->id ? $academicPeriod->name : old('name') }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <div class="mb-1 row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="description">{{ __('Description') }}</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-floating mb-0">
                                                    <textarea
                                                        data-length="200"
                                                        class="form-control char-textarea"
                                                        id="description"
                                                        name="description"
                                                        rows="3"
                                                        placeholder="{{ __('Description') }}"
                                                        style="height: 100px"
                                                    >{{ $academicPeriod->id ? $academicPeriod->description : old('description') }}</textarea>
                                                </div>
                                                <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="started_at_date">{{ __('Start at') }}</label>
                                        </div>
                                        <div class="col-sm-5 position-relative">
                                            <input type="text" id="started_at_date" name="started_at_date" class="form-control pickadate" placeholder="18 June, 2020" value="{{$academicPeriod->id ?  $academicPeriod->started_at->format('j F, Y') : old('started_at_date') }}"/>
                                        </div>
                                        <div class="col-sm-5 position-relative">
                                            <input type="text" id="started_at_time" name="started_at_time" class="form-control pickatime" placeholder="8:00 AM" value="{{ $academicPeriod->id ?  $academicPeriod->started_at->format('h:i:s A') :  old('started_at_time') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="finished_at_date">{{ __('Finish at') }}</label>
                                        </div>
                                        <div class="col-sm-5 position-relative">
                                            <input type="text" id="finished_at_date" name="finished_at_date" class="form-control pickadate" placeholder="18 June, 2020" value="{{ $academicPeriod->id ?  $academicPeriod->finished_at->format('j F, Y') : old('finished_at_date') }}"/>
                                        </div>
                                        <div class="col-sm-5 position-relative">
                                            <input type="text" id="finished_at_time" name="finished_at_time" class="form-control pickatime" placeholder="8:00 AM" value="{{ $academicPeriod->id ?  $academicPeriod->finished_at->format('h:i:s A') : old('finished_at_time') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="level_id">{{ __('Level') }}</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="select2 form-select" id="level_id" name="level_id">
                                                <option value="">{{ __("Select") }}</option>
                                                @foreach(\App\Models\Level::get() as $level)
                                                    <option value="{{ $level->id }}" {{ $level->id == $academicPeriod->level_id ? 'selected': '' }}>{{ __($level->custom_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="type">{{ __('Active') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="status"
                                                        id="active"
                                                        value="1"
                                                        {{ $academicPeriod->id ? ($academicPeriod->status == \App\Models\AcademicPeriod::ACTIVE ? 'checked' : '') : '' }}
                                                    />
                                                    <label class="form-check-label" for="active">{{ __('Yes') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="status"
                                                        id="inactive"
                                                        value="0"
                                                        {{ $academicPeriod->id ? (!$academicPeriod->status == \App\Models\AcademicPeriod::ACTIVE ? 'checked' : '') : 'checked' }}
                                                    />
                                                    <label class="form-check-label" for="inactive">{{ __('No') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 offset-sm-2 pt-2">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                    @if(!$academicPeriod->id)
                                    <button type="reset" id="clear" class="btn btn-outline-info">{{ __('Reset') }}</button>
                                    @endif
                                    <a href="{{ route('academic-periods.index') }}" class="btn btn-outline-secondary">{{ __('Return') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Horizontal form layout section end -->
@endsection

@push('vendor-scripts')
    <script src="{{ asset('vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('js/scripts/forms/pickers/form-pickers.js') }}"></script>
@endpush
@push('scripts')
    <script> document.getElementById("clear").reset() </script>
@endpush
