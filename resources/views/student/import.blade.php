@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endpush

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
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="name">{{ __('Load file to import') }}</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="file" id="file" name="file" style="display: flex;
                                         justify-content: center;padding-top: 5px;height:35px; font-size:14px;" required>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-10 offset-sm-2 mt-4">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Import') }}</button>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
