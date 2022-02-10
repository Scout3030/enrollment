@extends('layouts.app')

@push('vendor-styles')
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endpush

@section('content')
    <section class="app-user-list">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ App\Models\User::get()->count() }}</h3>
                            <span>{{ __('Total users') }}</span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                            <span class="avatar-content">
                              <i data-feather="user" class="font-medium-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ App\Models\User::role('administrator')->get()->count() }}</h3>
                            <span>{{ __('Administrators') }}</span>
                        </div>
                        <div class="avatar bg-light-danger p-50">
                            <span class="avatar-content">
                              <i data-feather="user-plus" class="font-medium-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ App\Models\User::role('manager')->get()->count() }}</h3>
                            <span>{{ __('Managers') }}</span>
                        </div>
                        <div class="avatar bg-light-success p-50">
                            <span class="avatar-content">
                              <i data-feather="user-check" class="font-medium-4"></i>
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
            <div class="card-datatable table-responsive pt-0">
                {!! $dataTable->table() !!}
            </div>
        </div>

        @can('create users')
            @include('user.create-modal')
        @endcan

        @can('edit users')
            @include('user.edit-modal')
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
            const userDatatable = $('#user-table').DataTable()
            userDatatable.on('click',  'tbody .editUser', function () {
                let userId = $(this).data('id');
                let $form = $('#editUserForm')
                $.ajax({
                    url: `{{ route('users.index') }}/${userId}`,
                    type: 'GET',
                    headers: {
                        'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                    },
                    success: (data) => {
                        populateForm($form, data.data)
                    }
                })
                $form.attr('action', `{{ route('users.index') }}/${userId}`)
            });

            @can('delete users')
            userDatatable.on('click',  'tbody .deleteUser', function () {
                let userId = $(this).data('id');
                $.ajax({
                    url: `{{ route('users.index') }}/${userId}`,
                    type: 'DELETE',
                    headers: {
                        'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                    },
                    success: (data, textStatus, xhr) => {
                        if(xhr.status === 200) {
                            userDatatable.ajax.reload();
                        }
                    }
                })
            });
            @endcan
        })
    </script>
@endpush

