@extends('layouts.app')

@section('title', __('Import students'))

@section('content')
    <section id="basic-horizontal-layouts">
        <form class="form form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('students.import') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Import data users') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0 pb-2">
                                    <label for="file" class="form-label">{{ __('Load file to import') }} <a href="{{ route('students.downloadFormat') }}">{{ __('File') }}</a></label>
                                    <input class="form-control" type="file" id="file" name="file"/>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0 pb-2">
                                    <a
                                        class="btn btn-primary float-end mt-2"
                                        href="{{ route('students.notification.reset-password') }}"
                                    >{{ __('Send password change emails') }}</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-1">{{ __('Import') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
