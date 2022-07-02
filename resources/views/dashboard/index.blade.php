@extends('layouts.app')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <section id="dashboard-analytics">

        @role('student')
        <div class="row match-height">
            <!-- Greetings Card starts -->
            @if($activeProcess->count() > 0)
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">{{ __('Active process') }}</h1>
                            @foreach($activeProcess as $process)
                                <a href="{{ route('user.grade') }}" class="btn btn-relief-info">{{ $process->level->custom_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(!(auth()->user()->student->enrollments && auth()->user()->student->enrollments->count() == 0))
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
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card border-warning">
                    <h6 class="card-header">Aviso</h6>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                Alumnado de nuevo ingreso que no proviene de centros adscritos debe presentar de manera presencial el Certificado Académico. No es necesario para alumnos de 1° de ESO de San Lázaro, Escuelas Blancas, Tudela Veguín, Veneranda Manzano y Villafría.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row match-height">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card card-congratulations">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/elements/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                            <img src="{{ asset('images/elements/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-primary shadow">
                                <div class="avatar-content">
                                    <i data-feather="award" class="font-large-1"></i>
                                </div>
                            </div>
                            @if(\App\Models\AcademicPeriod::latest()->first());
                            <div class="text-center">
                                <h1 class="mb-1 text-white">{{ __('Period') }} {{ \App\Models\AcademicPeriod::latest()->first()->name }}</h1>

                                <div class="text-center">
                                    @if(\App\Models\AcademicPeriod::latest()->first()->status)
                                        <span class="badge rounded-pill bg-success">{{ __('Active noun') }}</span>
                                    @else
                                        <span class="badge rounded-pill bg-warning">{{ __('Inactive noun') }}</span>
                                    @endif
                                </div>
                                <div class="text-center pt-1">
                                    <a
                                        href="{{ route('academic-periods.index') }}"
                                        type="button"
                                        class="btn btn-relief-info"
                                    >
                                        {{ __('Change status') }}
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card bg-success">
                        <div class="card-body text-center">
                            <div class="avatar avatar-xl bg-primary shadow">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-1 text-white">{{ __('Update main banner') }}</h1>
                                <div class="text-center pt-1">
                                    <a
                                        href="{{ route('settings.index') }}"
                                        type="button"
                                        class="btn btn-relief-info"
                                    >
                                        {{ __('Update') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
            @include('livewire.enrollment.components.popup')
    </section>
@endsection
@push('scripts')
  @if(setting('modal'))
    <script>
         $(document).ready(function() {
            $('#bannerModal').modal('show');
        })
    </script>
    @endif
@endpush
