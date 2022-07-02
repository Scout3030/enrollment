@extends('layouts.app')

@section('title')
    {{ __('Settings') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form
                        class="form"
                        method="POST"
                        action="{{ route('settings.store') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="image">{{ __('Banner') }}</label>
                                    <input type="file" id="image" class="form-control" value="{{ setting('image') }}"
                                           name="img" placeholder="{{ __('Banner') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="logo">{{ __('Logo') }}</label>
                                    <input type="file" id="logo" class="form-control" value="{{ setting('logo') }}"
                                           name="logos" placeholder="{{ __('Logo') }}">
                                </div>
                            </div>                            
                        </div>
                        <div class="row"> 
                        <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="image">{{ __('Show modal on startup') }}</label>
                                     <div class="form-check form-check-success form-switch ">
                                    <input type="checkbox" name="modal" {{(setting('modal') == \App\Models\Setting::ACTIVE) ? 'checked' : '' }} class="form-check-input c/hangeStatus">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


