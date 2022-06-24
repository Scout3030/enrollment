<?php

// Filter and order by relationships, raw
// https://yajrabox.com/docs/laravel-datatables/master/filter-column
// https://yajrabox.com/docs/laravel-datatables/master/order-column

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
            ->filterColumn('names', function($query, $keyword) {
                $query->whereHas('user', function($q) use ($keyword){
                    $q->where('name', "LIKE", "%{$keyword}%");
                })->orWhere('middle_name', "LIKE", "%{$keyword}%");
            })
            ->filterColumn('email', function($query, $keyword) {
                $query->whereHas('user', function($q) use ($keyword){
                    $q->where('email', "LIKE", "%{$keyword}%");
                });
            })
            ->filterColumn('surname', function($query, $keyword) {
                $sql = "CONCAT(students.paternal_surname,' ',students.maternal_surname)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('grade', function($query, $keyword) {
                $query->whereHas('grade', function($q) use ($keyword){
                    $q->where('name', "LIKE", "%{$keyword}%");
                });
            })
            ->filterColumn('level', function($query, $keyword) {
                $query->whereHas('grade', function($q) use ($keyword){
                    $q->whereHas('level', function($model) use ($keyword) {
                        $model->where('name', "LIKE", "%{$keyword}%");
                    });
                });
            })
            ->orderColumn('surname', function ($query, $order) {
                $query->orderBy('paternal_surname', $order);
            })
            ->orderColumn('email', function ($query, $order) {
                $query->join('users', 'users.id', '=', 'students.user_id')
                    ->orderBy('email', $order);
            })
            ->orderColumn('names', function ($query, $order) {
                $query->join('users', 'users.id', '=', 'students.user_id')
                    ->orderBy('name', $order);
            })
            ->orderColumn('grade', function ($query, $order) {
                $query->join('grades', 'grades.id', '=', 'students.grade_id')
                    ->orderBy('name', $order);
            })
            ->orderColumn('level', function ($query, $order) {
                $query->join('grades', 'grades.id', '=', 'students.grade_id')
                    ->join('levels', 'levels.id', '=', 'grades.level_id')
                    ->orderBy('name', $order);
            })
            ->addColumn('names', function(Student $student){
                return "{$student->user->name} {$student->middle_name}";
            })
            ->addColumn('surname', function(Student $student){
                return "{$student->paternal_surname} {$student->maternal_surname}";
            })
            ->addColumn('email', function(Student $student){
                return $student->user->email;
            })
            ->addColumn('grade', function(Student $student) {
                return $student->grade->name;
            })
            ->addColumn('level', function(Student $student) {
                return $student->grade->level->name;
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
                    ->setTableId('studentsDatatable')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"card-header border-bottom p-1"<"head-label">
                        <"dt-action-buttons text-right"B>>
                        <"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l>
                        <"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i>
                        <"col-sm-12 col-md-6"p>
                    >')
                    ->orderBy(0)
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
                                    Button::make('pdf')
                                        ->className('dropdown-item')
                                        ->text('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                    <rect x="6" y="14" width="12" height="8"></rect>
                                                </svg> '.__('Print')
                                        )
                                ]
                            ),
                        Button::make([])
                            ->className('add-new btn btn-primary')
                            ->text(__('Add student'))
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
            Column::make('level')
                ->title(__('Level'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Level')),
            Column::make('grade')
                ->title(__('Grade'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Grade')),
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
