@extends('layouts.app')

@section('title', __('Enrollment details'))

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
                                <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('images/avatars/user.png') }}" alt="{{ $enrollment->student->user->name }}" width="110" height="110">
                                <div class="user-info text-center">
                                    <h4>{{ $enrollment->student->user->full_name }}</h4>
                                    <span class="badge bg-light-secondary"><small>{{ $enrollment->student->user->email }}</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around my-2 pt-75">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">{{ $enrollment->grade->name }}</h4>
                                    <small>{{ $enrollment->grade->level->name }}</small>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">{{ __('Details') }}</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $enrollment->student->user->student->dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Date of birth') }}:</span>
                                    <span>{{ $enrollment->student->user->student->birth ? $enrollment->student->user->student->birth->format('Y-m-d') : '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Nationality') }}:</span>
                                    <span>{{ $enrollment->student->user->student->country ? $enrollment->student->user->student->country->name : '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $enrollment->student->user->student->address ?? '-' }}</span>
                                    <span><b>{{ __('Door') }}</b> {{ $enrollment->student->user->student->door ?? '-' }}</span>
                                    <span><b>{{ __('Stair') }}</b> {{ $enrollment->student->user->student->stair ?? '-' }}</span>
                                    <span><b>{{ __('Floor') }}</b> {{ $enrollment->student->user->student->floor ?? '-' }}</span>
                                    <span><b>{{ __('Letter') }}</b> {{ $enrollment->student->user->student->letter ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->


            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <div class="card">
                    <h4 class="card-header">{{ __('Attach document') }}</h4>
                    <div class="card-body">
                        <div class="info-container">
                            <div class="col-lg-6">
                                <div class="card">
                                    <!--  <div class="card-header">
                                          <h4 class="card-title">Basic</h4>
                                      </div>-->
                                    <div class="card-body">
                                        <ul class="timeline">
                                            @if($enrollment->dni_document)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('student DNI') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                        
                                                        @if(json_decode($enrollment->dni_document))
                                                           @foreach (json_decode($enrollment->dni_document) as $fil )
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $fil[1]]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                             @endforeach
                                                        @else
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $enrollment->dni_document]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->payment_document)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('Proof of payment of school insurance') }}</h6>

                                                        </div>
                                                        <div class="media align-items-center">
                                                         @if(json_decode($enrollment->payment_document))
                                                            @foreach (json_decode($enrollment->payment_document) as $fil )
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $fil[1]]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                            @endforeach
                                                             @else
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $enrollment->payment_document]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->agreement_document)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('Minor Custody Regulatory Agreement') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                          @if(json_decode($enrollment->agreement_document))                                                       
                                                             @foreach (json_decode($enrollment->agreement_document) as $fil )
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $fil[1]]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                             @endforeach
                                                              @else
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $enrollment->agreement_document]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->certificate_document)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('Official Academic Certificate of Studies') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                        @if(json_decode($enrollment->certificate_document))                                                       
                                                        @foreach (json_decode($enrollment->certificate_document) as $fil )
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $fil[1]]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        @endforeach
                                                         @else
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $enrollment->certificate_document]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->academic_history)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('Academic history') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                         @if(json_decode($enrollment->academic_history))                                                       
                                                         @foreach (json_decode($enrollment->academic_history) as $fil )
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $fil[1]]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                             @endforeach
                                                              @else
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'documents', 'file' => $enrollment->academic_history]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->student_signature)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('Student signature') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'signatures', 'file' => $enrollment->student_signature]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->first_tutor_signature)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('First tutor signature') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'signatures', 'file' => $enrollment->first_tutor_signature]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($enrollment->second_tutor_signature)
                                                <li class="timeline-item">
                                                    <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                    <div class="timeline-event">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                            <h6>{{ __('Second tutor signature') }}</h6>
                                                        </div>
                                                        <div class="media align-items-center">
                                                            <a href="{{ route('enrollments.download-document', ['path' => 'signatures', 'file' => $enrollment->second_tutor_signature]) }}" target="_blank">
                                                                <i data-feather='paperclip'></i>
                                                                {{ __('Download') }}
                                                                <div class="media-body"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
@endsection
