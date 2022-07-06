@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
@endpush

@section('title')
    {{ __('Enrollments') }}
@endsection

@section('content')
    <section class="app-user-list">
        <!-- list and filter start -->
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">{{ __('Search & Filter')}} </h4>
                <div class="row">
                    <div class="col-md-4 student_level">
                        <label class="form-label" for="levels">{{ __('Level') }}</label>
                        <select id="levels" name="levels[]" class="form-select text-capitalize mb-md-0 mb-2 select2" multiple>
                            @foreach(\App\Models\Level::get() as $level)
                            <option value="{{$level->id}}"> {{$level->custom_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 user_plan">
                        <label class="form-label" for="grades">{{ __('Grades') }}</label>
                        <select id="grades" name="grades[]" class="form-select text-capitalize mb-md-0 mb-2 select2" multiple>
                        </select>
                    </div>
                    <div class="col-md-4 user_status">
                        <div class="mb-1">
                            <label class="form-label" for="dates">{{ __('Dates') }}</label>
                            <input
                                type="text"
                                id="dates"
                                class="form-control"
                                placeholder="YYYY-MM-DD {{__('to')}} YYYY-MM-DD"
                                value=""
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-datatable pt-0">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </section>
@endsection

@push('vendor-scripts')
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    {{--range picker--}}
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
@endpush

@push('scripts')
    <script>
        let dates = null;
    </script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function() {
            const enrollmentDatatable = $('#enrollmentDatatable').DataTable();
            const levelsNode = $('#levels');
            const gradesNode = $('#grades');

            $("#dates").flatpickr(
                {
                    mode: 'range',
                    dateFormat: 'd-m-Y',
                    enableTime: false,
                    locale: {
                        firstDayOfWeek: 1,
                        weekdays: {
                            shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                            longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        },
                        months: {
                            shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                            longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        },
                    },
                    onChange: function(selectedDates, dateStr, instance) {
                        if(selectedDates.length === 2){
                            const from = moment(selectedDates[0]).format('YYYY-MM-DD');
                            const to = moment(selectedDates[1]).format('YYYY-MM-DD');
                            dates = [from, to];
                            enrollmentDatatable.draw();
                        }
                    }
                }
            );

            gradesNode.select2({
                placeholder: "{{ __('Select only one level') }}",
            });

            levelsNode.select2({
                placeholder: "{{ __('Select level') }}",
            });

            levelsNode.on('change', function (){
                enrollmentDatatable.draw();
            })

            gradesNode.on('change', function (){
                enrollmentDatatable.draw();
            })

            levelsNode.on('change', function(){
                const levelId = $(this).val()
                if(levelId.length === 1){
                    populateSelect(levelId[0])
                } else {
                    gradesNode.empty();
                    gradesNode.select2({
                        placeholder: "{{ __('Select only one level') }}",
                    });
                }
            })

            function populateSelect(levelId){
                $.ajax({
                    url: `{{ route('grades.index') }}/level/${levelId}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            gradesNode.empty();
                            gradesNode.select2({
                                data: data.data,
                                placeholder: "{{ __('Select only one level') }}",
                            });
                        }
                    }
                })
            }
        })
    </script>
@endpush

