@extends('layouts.app')

@section('title')
    {{ __('Courses') }}
@endsection

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endpush

@section('content')
    <section class="app-user-list">
        <!-- list and filter start -->
        <x-jet-validation-errors class="mb-4" />
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">{{ __('Search & Filter')}} </h4>
                <div class="row">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            @if (session('messages'))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">{{ __('Whoops! Something went wrong.') }}</h4>
                    <div class="alert-body">
                        <ul class="mt-1 list-disc list-inside text-sm text-red-600">
                            <li>{{ session('messages')['description'] }}</li>
                        </ul>
                    </div>
                </div>
            @endif
            <div class="card-datatable table-responsive pt-0">
                {!! $dataTable->table() !!}
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('Delete period') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Click confirm to delete the period. This action is not reversible.') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button
                        type="button"
                        class="btn btn-primary"
                        onclick="event.preventDefault(); document.getElementById('deleteperiodForm').submit();"
                    >{{ __('Confirm') }}</button>
                </div>
                <form method="POST" id="deleteperiodForm" action="#">
                    @method('delete')
                    @csrf
                </form>
            </div>
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
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function(){
            const academicPeriodsDatatable = $('#academic-periods-table').DataTable()
            @can('delete academic periods')
                academicPeriodsDatatable.on('click',  'tbody .deleteAcademicPeriod', function () {
                let AcademicPeriodId = $(this).data('id');
                let $form = $('#deleteperiodForm')
                $form.attr('action', `{{ route('academic-periods.index') }}/${AcademicPeriodId}`)
            });
            @endcan

            @can('edit academic periods')
            academicPeriodsDatatable.on('click', 'tbody .changeStatus', function() {
                let id = $(this).data('id');
                var statu = this.checked;
                if(statu){status = 1;}else{status=0;}                
                 $.ajax({
                        url: `{{ route('academic-periods.change-status') }}`,
                        type: 'post',
                    
                        headers: {
                            'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                        },
                         data:{id:id, status:status}, 
                        error: function(data, textStatus, xhr) {                       
                            toastr.error(`{{ __('error, you must select at least one period') }}`)
                        },               
                        success: (data, textStatus, xhr) => {
                            if(xhr.status === 200) {
                           academicPeriodsDatatable.ajax.reload();                         
                                toastr.success(data.status)
                            }
                        }
                 })
            });
            @endcan
        })
    </script>
@endpush

