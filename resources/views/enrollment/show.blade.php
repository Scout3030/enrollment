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
                            <div class="d-flex justify-content-center pt-2">
                                <a href="{{ route('user.profile.edit') }}" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                    {{ __('Export') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- Contextual classes start -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Level courses') }}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Course') }}</th>
                                <th>{{ __('Preference') }}</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($levelCourses as $course)
                            <tr class="table-default">
                                <td>
                                    <span class="fw-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td>{{ $course->name }}</td>
                                <td>
                                    <span class="fw-bold">{{ '-' }}</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="table-active">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/react.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="React"
                                    />
                                    <span class="fw-bold">React Project</span>
                                </td>
                                <td>Ronald Frest</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-success me-1">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-primary">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/angular.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Angular"
                                    />
                                    <span class="fw-bold">Angular Project</span>
                                </td>
                                <td>Peter Charls</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-secondary">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/vuejs.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Vuejs"
                                    />
                                    <span class="fw-bold">Vuejs Project</span>
                                </td>
                                <td>Jack Obes</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-secondary me-1">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-success">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/bootstrap.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Bootstrap"
                                    />
                                    <span class="fw-bold">Bootstrap Project</span>
                                </td>
                                <td>Jerry Milton</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-success me-1">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-danger">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/figma.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Figma"
                                    />
                                    <span class="fw-bold">Figma Project</span>
                                </td>
                                <td>Janne Ale</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-danger me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-warning">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/react.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="React"
                                    />
                                    <span class="fw-bold">React Custom</span>
                                </td>
                                <td>Ted Richer</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-warning me-1">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-info">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/bootstrap.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Bootstrap"
                                    />
                                    <span class="fw-bold">Latest Bootstrap</span>
                                </td>
                                <td>Perry Parker</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-info me-1">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/angular.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Angular"
                                    />
                                    <span class="fw-bold">Angular UI</span>
                                </td>
                                <td>Ana Bell</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-primary me-1">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-dark">
                                <td>
                                    <img
                                        src="http://full-version.test/images/icons/bootstrap.svg"
                                        class="me-75"
                                        height="20"
                                        width="20"
                                        alt="Bootstrap"
                                    />
                                    <span class="fw-bold">Bootstrap UI</span>
                                </td>
                                <td>Jerry Milton</td>
                                <td>
                                    <div class="avatar-group">
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Lilian Nenez"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-6.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                        <div
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar pull-up my-0"
                                            title="Alberto Glotzbach"
                                        >
                                            <img
                                                src="http://full-version.test/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar"
                                                height="26"
                                                width="26"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge rounded-pill badge-light-info me-1">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Contextual classes end -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- Project table -->
                <div class="card">
                    <h4 class="card-header">{{ __('Level courses') }}</h4>
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Full name') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_full_name ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Phone number') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_phone_number ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Email') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_email ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_address ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Project table -->
                <div class="card">
                    <h4 class="card-header">{{ __('Tutor 01 details') }}</h4>
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Full name') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_full_name ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Phone number') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_phone_number ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Email') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_email ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $enrollment->student->user->student->first_tutor_address ?? '-' }}</span>
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
                                    <span>{{ $enrollment->student->user->student->second_tutor_full_name ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('DNI') }}:</span>
                                    <span>{{ $enrollment->student->user->student->second_tutor_dni ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Phone number') }}:</span>
                                    <span>{{ $enrollment->student->user->student->second_tutor_phone_number ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Email') }}:</span>
                                    <span>{{ $enrollment->student->user->student->second_tutor_email ?? '-' }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('Address') }}:</span>
                                    <span>{{ $enrollment->student->user->student->second_tutor_address ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if($enrollment->student->user->student->bus_stop_id)
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
                                        <span>{{ $enrollment->student->user->student->bus_stop_id ? $enrollment->student->user->student->busStop->route->name : null }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">{{ __('Bus stop') }}</span>
                                        <span>{{ $enrollment->student->user->student->bus_stop_id ? $enrollment->student->user->student->busStop->name : null }}</span>
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
