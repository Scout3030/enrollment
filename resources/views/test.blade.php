@extends('layouts.app')

@push('styles')
    <link href="{{ asset('drag-and-drop/demo.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('drag-and-drop/draganddrop.css') }}" rel='stylesheet' type='text/css'>
@endpush

@section('content')
    <h3>Draggables</h3>


    <h3>Off Switch</h3>
    <button class="btn btn-primary off">All off</button>

    <div class="row">
        <div class="col-2 col-md-1">
            <div class="card mb-4">
                <ul class="list-group list-group-flush">
                    @foreach($commonOptionalOneCourses as $course)
                        <li class="list-group-item numerator">
                            <span class="badge badge-light-success rounded-pill ms-auto me-2"> {{ $loop->iteration }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-10 col-md-11">
            <div id="sortable2" class="row custom-options-checkable g-1">
               <div class="list">
                    @foreach($commonOptionalOneCourses as $key => $course)
                        <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                            <div class="col-md-12">
                                <input
                                    class="custom-option-item-check"
                                    type="checkbox"
                                    name="elective_courses[]"
                                    id="elective_course_{{ $course->id }}"
                                    value='{"id":"{{ $course->id }}", "order":"{{ $key + 1 }}"}'
                                    checked
                                    onclick="this.checked = true"
                                />
                                <label class="custom-option-item p-1" for="elective_course_{{ $course->id }}">
                                                        <span class="d-flex justify-content-between flex-wrap mb-50">
                                                            <span class="fw-bolder">{{ __($course->name).' ('.$course->duration.'h)'.($course->bilingual ? '*' : '') }}</span>
                                                        </span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src='{{ asset('drag-and-drop/draganddrop.js') }}' type='text/javascript'></script>
    <script type='text/javascript'>
        $(function() {
            $('.list').sortable({container: '.list'});
            //off switch
            $('.off').on('click', function() {
                $('.sortable').each(function() { $(this).sortable('destroy'); });
                $('.draggable').each(function() { $(this).draggable('destroy'); });
            });
        });
    </script>
@endpush
