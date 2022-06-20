<!-- Contextual classes start -->
<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Common courses') }} ({{ __('required') }})</h4>
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
                @foreach($Courses as $course)
                    @if(App\Models\CourseType::COMMON == $course->course_type_id)
                    <tr class="table-default">
                        <td>
                            <span class="fw-bold">{{ ($loop->iteration) }}</span>
                        </td>
                        <td>{{ __($course->name) }}</td>
                        <td>
                            <span class="fw-bold">{{ '-' }}</span>
                        </td>
                        <td><span class="fw-bold">{{ $course->duration }} h</span></td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Optional course') }} {{ __('(Numbered in order of preference)')  }}</h4>
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
                @foreach($Courses as $course)
                @if(App\Models\CourseType::COMMON_OPTIONAL_ONE == $course->course_type_id)
                    <tr class="table-info">
                        <td>
                            <span class="fw-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td>{{ __($course->name) }}</td>
                        <td>{{ $course->pivot->order }}</td>
                        <td><span class="fw-bold">{{ $course->duration }} h</span></td>
                    </tr>
                @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div> 
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Optional course') }} {{ __('(selected)')  }}</h4>
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
                @foreach($Courses as $course)
                @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id)
                    <tr class="table-info">
                        <td>
                            <span class="fw-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td>{{ __($course->name) }}</td>
                        <td>{{ $course->pivot->order }}</td>
                        <td><span class="fw-bold">{{ $course->duration }} h</span></td>
                    </tr>
                @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>   
</div>
<!-- Contextual classes end -->
