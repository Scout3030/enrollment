@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endpush

@section('title', __('Students'))

@section('content')
    <section class="app-user-list">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ App\Models\User::role('student')->get()->count() }}</h3>
                            <span>{{ __('Students') }}</span>
                        </div>
                        <div class="avatar bg-light-warning p-50">
                            <span class="avatar-content">
                              <i data-feather="user-x" class="font-medium-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- list and filter start -->
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">{{ __('Search & Filter')}} </h4>
                <div class="row">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <div class="card-datatable pt-0">
                {!! $dataTable->table() !!}
            </div>
        </div>

        @can('create students')
            @include('student.create-modal')
        @endcan

        @can('delete students')
            @include('student.delete-modal')
        @endcan

        @can('edit users')
            @include('student.edit-modal')
        @endcan
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
@endpush

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function(){
            const studentDatatable = $('#studentsDatatable').DataTable()
            const select2Modal = $('#editStudentForm');
            const gradeEditNode = $('#grade_id_edit')
            const levelEditNode = $('#level_id_edit')

            levelEditNode.select2({
                dropdownParent: select2Modal
            });

            gradeEditNode.select2({
                dropdownParent: select2Modal
            });

            @can('delete users')
            studentDatatable.on('click',  'tbody .deleteStudent', function () {
                let studentId = $(this).data('id');
                let $form = $('#deleteStudentForm')
                $form.attr('action', `{{ route('students.index') }}/${studentId}`)
            });
            @endcan

            @can('edit users')
            studentDatatable.on('click',  'tbody .editStudent', function () {
                let studentId = $(this).data('id');
                let userId = $(this).data('user-id');
                let $form = $('#editStudentForm')
                $.ajax({
                    url: `{{ route('students.index') }}/${studentId}`,
                    type: 'GET',
                    headers: {
                        'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                    },
                    success: (data) => {
                        populateForm($form, data.data)
                        setTimeout(function(){
                            levelEditNode.val(data.data.level_id).trigger('change');
                            populateSelectEdit(data.data.level_id)
                            setTimeout(function(){
                                gradeEditNode.val(data.data.grade_id).trigger('change');
                            }, 500)
                        }, 500)
                    }
                })
                $form.attr('action', `{{ route('users.index') }}/${userId}`)
            });
            @endcan

            @can('create students')
            const levelNode = $('#level_id')
            const gradeNode = $("#grade_id")
            const typeNode = $("#course_type_id")

            let firstLevelId = levelNode.select2().val()
            populateSelect(firstLevelId)
            populateTypesSelect(firstLevelId)

            levelNode.on('change', function(){
                const levelId = $(this).val()
                populateSelect(levelId)
                populateTypesSelect(levelId)
            })

            levelEditNode.on('change', function(){
                const levelId = $(this).val()
                populateSelectEdit(levelId)
            })

            function populateSelect(levelId){
                $.ajax({
                    url: `{{ route('grades.index') }}/level/${levelId}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            gradeNode.empty();
                            gradeNode.select2({
                                data: data.data
                            });
                        }
                    }
                })
            }

            function populateSelectEdit(levelId){
                $.ajax({
                    url: `{{ route('grades.index') }}/level/${levelId}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            gradeEditNode.empty();
                            gradeEditNode.select2({
                                dropdownParent: select2Modal,
                                data: data.data
                            });
                        }
                    }
                })
            }

            function populateTypesSelect(levelId){
                $.ajax({
                    url: `{{ route('courseTypes.index') }}/level/${levelId}`,
                    type: 'GET',
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            typeNode.empty();
                            typeNode.select2({
                                data: data.data
                            });
                        }
                    }
                })
            }
            @endcan
        })
    </script>
@endpush

