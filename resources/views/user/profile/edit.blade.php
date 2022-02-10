@extends('layouts.app')

@section('content')
    @role('student')
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
                              action=""
                        >
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
                                                   value="" />
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
                                                    ></textarea>
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
                                                <option value="{{ \App\Models\Course::OPTIONAL }}">{{ __('Optional') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                    <button type="reset" class="btn btn-outline-info">{{ __('Reset') }}</button>
                                    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">{{ __('Return') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endrole
@endsection
