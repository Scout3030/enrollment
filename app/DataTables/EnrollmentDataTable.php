<?php

namespace App\DataTables;

use App\Models\Enrollment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EnrollmentDataTable extends DataTable
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
            ->addColumn('student', function (Enrollment $enrollment){
                return $enrollment->student->user->full_name;
            })
            ->addColumn('grade', function (Enrollment $enrollment){
                return __($enrollment->grade->name). "/" .__($enrollment->grade->level->name);
            })
            ->addColumn('action', 'enrollment.datatable.action')
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Enrollment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Enrollment $model)
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
                    ->setTableId('enrollment-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
            Column::make('id'),
            Column::make('student')
                ->title(__('Student'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Student')),
            Column::make('grade')
                ->title(__('Grade/Level'))
                ->searchable(true)
                ->orderable(true)
                ->footer(__('Grade/Level')),
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
        return 'Enrollment_' . date('YmdHis');
    }
}
