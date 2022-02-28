@extends('layouts.app')

@section('content')
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('images/avatars/user.png') }}" alt="{{ $student->user->name }}" width="110" height="110">
                                <div class="user-info text-center">
                                    <h4>{{ $student->user->full_name }}</h4>
                                    <span class="badge bg-light-secondary"><small>{{ $student->user->email }}</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around my-2 pt-75">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">3er B</h4>
                                    <small>Primaria</small>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">{{ __('Details') }}</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $student->dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Date of birth') }}:</span>
                                    <span>{{ $student->birth ? $student->birth->format('Y-m-d') : '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Nationality') }}:</span>
                                    <span>{{ $student->country ? $student->country->name : '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $student->address ?? '-' }}</span>
                                    <span><b>{{ __('Door') }}</b> {{ $student->door ?? '-' }}</span>
                                    <span><b>{{ __('Stair') }}</b> {{ $student->stair ?? '-' }}</span>
                                    <span><b>{{ __('Floor') }}</b> {{ $student->floor ?? '-' }}</span>
                                    <span><b>{{ __('Letter') }}</b> {{ $student->letter ?? '-' }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-center pt-2">
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- Project table -->
                <div class="card">
                    <h4 class="card-header">{{ __('Tutor 01 details') }}</h4>
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Full name') }}:</span>
                                    <span>{{ $student->first_tutor_full_name ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $student->first_tutor_dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Phone number') }}:</span>
                                    <span>{{ $student->first_tutor_phone_number ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Email') }}:</span>
                                    <span>{{ $student->first_tutor_email ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $student->first_tutor_address ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Project table -->

                <div class="card">
                    <h4 class="card-header">{{ __('Tutor 02 details') }}</h4>
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Full name') }}:</span>
                                    <span>{{ $student->second_tutor_full_name ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $student->second_tutor_dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Phone number') }}:</span>
                                    <span>{{ $student->second_tutor_phone_number ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Email') }}:</span>
                                    <span>{{ $student->second_tutor_email ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $student->second_tutor_address ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if($student->bus_stop_id)
                            <div class="d-flex justify-content-around my-2 pt-75">
                                <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                    <div class="ms-75">
                                        <h4 class="mb-0">{{ __('Transportation') }}</h4>
                                        <small>{{ __('Requested') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="info-container">
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">{{ __('Route') }}</span>
                                        <span>{{ $student->bus_stop_id ? $student->busStop->route->name : null }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">{{ __('Bus stop') }}</span>
                                        <span>{{ $student->bus_stop_id ? $student->busStop->name : null }}</span>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="d-flex justify-content-around my-2 pt-75">
                                <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </span>
                                    <div class="ms-75">
                                        <h4 class="mb-0">{{ __('Transportation') }}</h4>
                                        <small>{{ __('No requested') }}</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
@endsection
