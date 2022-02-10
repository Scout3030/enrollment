<?php

namespace App\DataTables;

use App\Models\Student;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('names', function(Student $student){
                return "{$student->user->name} {$student->middle_name}";
            })
            ->addColumn('surname', function(Student $student){
                return "{$student->paternal_surname} {$student->maternal_surname}";
            })
            ->addColumn('email', function(Student $student){
                return $student->user->email;
            })
            ->addColumn('email_verified_at', function(Student $student){
                return $student->user->email_verified_at ? __('Yes') : __('No');
            })
            ->addColumn('action', 'student.datatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->parameters([
                        'paging' => true,
                        'lengthMenu'  => [[10, 20, 50, 100], [10, 20, 50, 100]],
                        'searchDelay' => 1000,
                    ])
                    ->language([
                        'url' => '//cdn.datatables.net/plug-ins/1.10.16/i18n/'.config('languages')[session('applocale')][0].'.json',
                    ])
                    ->setTableId('student-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make([])
                            ->extend('collection')
                            ->className('btn btn-outline-secondary dropdown-toggle me-2')
                            ->text('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                                <polyline points="15 3 21 3 21 9"></polyline>
                                                <line x1="10" y1="14" x2="21" y2="3"></line>
                                            </svg> '.__('Export'))
                            ->buttons([
                                    Button::make('excel')
                                        ->className('dropdown-item')
                                        ->text('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                        <polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line>
                                                        <line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg> '.__('Excel')
                                        )
                                        ->titleAttr('Excel'),
                                    Button::make('print')
                                        ->className('dropdown-item')
                                        ->text('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                    <rect x="6" y="14" width="12" height="8"></rect>
                                                </svg> '.__('Print')
                                        ),
                                    Button::make('reload')
                                        ->text('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader">
                                                    <line x1="12" y1="2" x2="12" y2="6"></line>
                                                    <line x1="12" y1="18" x2="12" y2="22"></line>
                                                    <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                                    <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                                    <line x1="2" y1="12" x2="6" y2="12"></line>
                                                    <line x1="18" y1="12" x2="22" y2="12"></line>
                                                    <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                                    <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                                </svg> '.__('Reload')
                                        )
                                        ->className('dropdown-item'),
                                ]
                            ),
                        Button::make([])
                            ->className('add-new btn btn-primary')
                            ->text(__('Add user'))
                            ->attr([
                                'data-bs-toggle' => 'modal',
                                'data-bs-target' => '#modals-slide-in',
                            ])
                            ->init(
                                "function (api, node, config) {
                                        $(node).removeClass('btn-secondary');
                                        $(node).parent().removeClass('btn-group');
                                        setTimeout(function () {
                                          $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                                        }, 50);
                                    }"
                            )
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->title('Id')
                ->searchable(true)
                ->orderable(true)
                ->footer('Id'),
            Column::make('names')
                ->title(__('Names'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Names')),
            Column::make('surname')
                ->title(__('Surname'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Surname')),
            Column::make('dni')
                ->title(__('DNI'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('DNI')),
            Column::make('email')
                ->title(__('Email'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Email')),
            Column::make('email_verified_at')
                ->title(__('Email verified'))
                ->searchable(true)
                ->orderable(true)
                ->width(20)
                ->addClass('text-center')
                ->footer(__('Email verified')),
            Column::make('created_at')
                ->title(__('Created'))
                ->searchable(true)
                ->orderable(true)
                ->addClass('text-center')
                ->footer(__('Created')),
            Column::computed('action')
                ->title(__('Actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->footer(__('Actions')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Student_' . date('YmdHis');
    }
}