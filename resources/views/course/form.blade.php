@extends('layouts.app')

@push('vendor-styles')
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
                        <h4 class="card-title">{{ __('Add course') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal"
                              method="POST"
                              action="{{ $course->id ? route('courses.update', $course) : route('courses.store') }}"
                        >
                            @if($course->id)
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
                                            <input type="text"
                                                   id="name"
                                                   class="form-control"
                                                   name="name"
                                                   placeholder="{{__('Name')}}"
                                                   value="{{ $course->id ? $course->name : old('name') }}" />
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
                                                    >{{ $course->id ? $course->description : old('description') }}</textarea>
                                                </div>
                                                <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="type">{{ __('Type') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="select2 form-select" id="type" name="type">
                                                <option value="{{ \App\Models\Course::MANDATORY }}">{{ __('Regular') }}</option>
                                                <option value="{{ \App\Models\Course::MANDATORY_OPTIONAL }}">{{ __('Optional') }}</option>
                                                <option value="{{ \App\Models\Course::OPTIONAL }}">{{ __('Optional') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                    @if(!$course->id)
                                    <button type="reset" class="btn btn-outline-info">{{ __('Reset') }}</button>
                                    @endif
                                    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">{{ __('Return') }}</a>
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
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script>
    <script>
        $(document).ready(function(){
            const levelNode = $('#level_id')
            const gradeNode = $("#grade_id")
            const typeNode = $("#type")

            let firstLevelId = levelNode.select2().val()
            populateSelect(firstLevelId)

            levelNode.on('change', function(){
                const levelId = $(this).val()
                populateSelect(levelId)
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

            @if($course->id)
                levelNode.val({{$course->grade ? $course->grade->level->id : 3}}).trigger('change')
                typeNode.val({{$course->type}}).trigger('change')
                setTimeout(function(){
                    gradeNode.val({{$course->grade_id}}).trigger('change')
                }, 500)
            @endif
        })
    </script>
@endpush
