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
                    <th>{{ __('Duration') }}</th>
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
                        <td><span class="fw-bold">{{ '-' }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Elective courses') }}</h4>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Course') }}</th>
                    <th>{{ __('Preference') }}</th>
                    <th>{{ __('Duration') }} (h)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($electiveCourses as $course)
                    <tr class="table-info">
                        <td>
                            <span class="fw-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->pivot->order }}</td>
                        <td>
                            <span class="fw-bold">{{ '-' }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($enrollment->student->grade->id == \App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Free configuration courses') }}</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Course') }}</th>
                        <th>{{ __('Preference') }}</th>
                        <th>{{ __('Duration') }} (h)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($freeConfigurationCourses as $course)
                        <tr class="table-warning">
                            <td>
                                <span class="fw-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->pivot->order }}</td>
                            <td>
                                <span class="fw-bold">{{ '-' }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Applied courses') }}</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Course') }}</th>
                        <th>{{ __('Preference') }}</th>
                        <th>{{ __('Duration') }} (h)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appliedCourses as $course)
                        <tr class="table-primary">
                            <td>
                                <span class="fw-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->pivot->order }}</td>
                            <td>
                                <span class="fw-bold">{{ '-' }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Academic courses') }}</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Course') }}</th>
                        <th>{{ __('Preference') }}</th>
                        <th>{{ __('Duration') }} (h)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appliedCourses as $course)
                        <tr class="table-success">
                            <td>
                                <span class="fw-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->pivot->order }}</td>
                            <td>
                                <span class="fw-bold">{{ '-' }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
<!-- Contextual classes end -->
