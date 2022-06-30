@extends('layouts.app')

@section('content')
    <h3>Draggables</h3>
    <button class="btn btn-primary drag">Drag me</button>
    <button class="btn btn-primary draghandle">Drag my <strong class="handle">handle</strong></button>
    <button class="btn btn-primary dragdrop">Drag and Drop me</button>
    <span class="draggables">
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
    </span>

    <div class="drop"><p>Drop here</p></div>

    <h3>Normal List</h3>
    <ul class="normal">
        <li>Item 1</li>
        <li>Item 2
            <ul>
                <li>Item 2.1</li>
                <li>Item 2.2
                    <ul>
                        <li>Item 2.2.1</li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>Item 3
            <ul>
                <li>Item 3.1</li>
            </ul>
        </li>
    </ul>

    <h3>Floating LI elements</h3>
    <ul class="float">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
        <li>
            Item 3
        </li>
        <li>
            Item 4
        </li>
    </ul>

    <h3>Inline-block LI elements</h3>
    <ul class="inline">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
        <li>
            Item 3
        </li>
        <li>
            Item 4
        </li>
    </ul>

    <h3>Grouped Lists</h3>
    <ul class="grouped">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
    </ul>
    <ul class="grouped">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
    </ul>

    <h3>List of DIVs</h3>
    <div class="list parent">
        <div>Child 1</div>
        <div>Child 2</div>
        <div>
            Child 3
            <div class="list">
                <div>Subchild</div>
            </div>
        </div>
    </div>

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
                @if(old('elective_courses'))
                    @foreach(old('elective_courses') as $order)
                        @foreach($commonOptionalOneCourses as $key => $course)
                            @if(json_decode($order)->id == $course->id)
                                <div class="row3" order="{{ $key + 1 }}" course_id="{{ $course->id }}">
                                    <div class="col-md-12">
                                        <input
                                            class="custom-option-item-check"
                                            type="checkbox"
                                            name="elective_courses[]"
                                            id="elective_course_{{ $course->id }}"
                                            value='{"id":"{{ $course->id }}", "order":"{{ json_decode($order)->order }}"}'
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
                            @endif
                        @endforeach
                    @endforeach
                @else
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
                @endif
            </div>
        </div>
    </div>
@endsection
