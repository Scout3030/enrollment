@extends('layouts.app')

@push('styles')
    <link href="{{ asset('drag-and-drop/demo.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('drag-and-drop/draganddrop.css') }}" rel='stylesheet' type='text/css'>
@endpush

@section('content')
    <h3>Draggables</h3>


    <section id="card-content-types">
        <h5 class="mt-3">Content Types</h5>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <h6 class="my-2 text-muted">Body</h6>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">
                            This is some text within a card body. Jelly lemon drops tiramisu chocolate cake cotton candy soufflé oat
                            cake sweet roll. Sugar plum marzipan dragée topping cheesecake chocolate bar. Danish muffin icing donut.
                        </p>
                    </div>
                </div>
                <h6 class="my-2 text-muted">Titles, Text, and Links</h6>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <div class="card-subtitle text-muted mb-1">Card subtitle</div>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <h6 class="my-2 text-muted">List Groups</h6>
                <div class="card mb-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h6 class="my-2 text-muted">Images</h6>
                <div class="card mb-4">
                    <img class="card-img-top" src="../../../app-assets/images/slider/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <p class="card-text">
                            Cookie topping caramels jujubes gingerbread. Lollipop apple pie cupcake candy canes cookie ice cream. Wafer
                            chocolate bar carrot cake jelly-o.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h6 class="my-2 text-muted">Kitchen Sink</h6>
                <div class="card">
                    <img class="card-img-top" src="../../../app-assets/images/slider/02.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>

        <h6 class="my-2 text-muted">Header and Footer</h6>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content natural lead-in to additional content.
                        </p>
                        <a href="#" class="btn btn-outline-primary waves-effect">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <h6 class="card-header">Quote</h6>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit
                                amet, Integer posuere erat a ante Integer posuere erat a anteconsectetur.
                            </p>
                            <footer class="blockquote-footer">
                                Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural.</p>
                        <a href="#" class="btn btn-outline-primary waves-effect">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                </div>
            </div>
        </div>
    </section>
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
    <section id="card-content-types">
        <h5 class="mt-3">Content Types</h5>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <h6 class="my-2 text-muted">Body</h6>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">
                            This is some text within a card body. Jelly lemon drops tiramisu chocolate cake cotton candy soufflé oat
                            cake sweet roll. Sugar plum marzipan dragée topping cheesecake chocolate bar. Danish muffin icing donut.
                        </p>
                    </div>
                </div>
                <h6 class="my-2 text-muted">Titles, Text, and Links</h6>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <div class="card-subtitle text-muted mb-1">Card subtitle</div>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <h6 class="my-2 text-muted">List Groups</h6>
                <div class="card mb-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h6 class="my-2 text-muted">Images</h6>
                <div class="card mb-4">
                    <img class="card-img-top" src="../../../app-assets/images/slider/01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <p class="card-text">
                            Cookie topping caramels jujubes gingerbread. Lollipop apple pie cupcake candy canes cookie ice cream. Wafer
                            chocolate bar carrot cake jelly-o.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h6 class="my-2 text-muted">Kitchen Sink</h6>
                <div class="card">
                    <img class="card-img-top" src="../../../app-assets/images/slider/02.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>

        <h6 class="my-2 text-muted">Header and Footer</h6>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional content natural lead-in to additional content.
                        </p>
                        <a href="#" class="btn btn-outline-primary waves-effect">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <h6 class="card-header">Quote</h6>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit
                                amet, Integer posuere erat a ante Integer posuere erat a anteconsectetur.
                            </p>
                            <footer class="blockquote-footer">
                                Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural.</p>
                        <a href="#" class="btn btn-outline-primary waves-effect">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                </div>
            </div>
        </div>
    </section>
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
