@extends('layouts.app')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <section id="dashboard-analytics">
        @role('student')
        <div class="modal fade" id="bannerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bannerModalLabel">{{ __('Learn about this registration process') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" align="center">
                        <img class="img-fluid rounded mt-3 mb-2" src="{{ asset(setting('image')) }}" alt="" height="100%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Ok') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <!-- Greetings Card starts -->
            @if(auth()->user()->student->hasActiveProcess())
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">{{ __('You have a pending enrollment process') }}</h1>
                            <a href="{{ route('enrollment.create') }}" class="btn btn-relief-info">{{ __('Start here') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">{{ __('You have registered successfully') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- Greetings Card ends -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">{{ __('Update your personal info') }}</h1>
                            <a href="{{ route('user.profile.edit') }}" class="btn btn-relief-info">{{ __('Start here') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">{{ __('Learn about this registration process') }}</h1>
                             <button
                                type="button"
                                class="btn btn-relief-info"
                                data-bs-toggle="modal"
                                data-bs-target="#bannerModal"
                            >
                            {{ __('Start here') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </section>
@endsection

@push('scripts')
    <script>
         $(document).ready(function() {
            $('#bannerModal').modal('show');
        })
    </script>
@endpush
