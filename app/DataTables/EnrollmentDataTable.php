<?php

namespace App\DataTables;

// Filter and order by relationships, raw
// https://yajrabox.com/docs/laravel-datatables/master/filter-column
// https://yajrabox.com/docs/laravel-datatables/master/order-column

use App\Models\Enrollment;
use App\Models\Level;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
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
            ->filter(function ($query) {
                $keyword = request()->search['value'];

                if (request()->filled('dates')) {
                    $dates = request()->input('dates');
                    $from = Carbon::parse($dates[0]);
                    $to = Carbon::parse($dates[1])->addDay();
                    $query = $query->where('created_at', '>=', $from)
                        ->where('created_at', '<', $to);
                }

                if (request()->filled('levels')) {
                    if (request()->filled('grades')) {
                        $grades = request()->input('grades');
                        $query = $query->whereHas('grade', function($q) use ($grades){
                            $q->whereIn('id', $grades);
                        });
                    } else {
                        $levels = request()->input('levels');
                        $query = $query->whereHas('grade', function($q) use ($levels){
                            $q->whereHas('level', function($q) use ($levels){
                                $q->whereIn('id', $levels);
                            });
                        });
                    }
                }
                
                if ($keyword) {
                    $query = $query->where(function ($q) use ($keyword) {
                        $q->whereHas('student', function($q) use ($keyword){
                            $q->whereHas('user', function($q) use ($keyword){
                                $q->where('name', "LIKE", "%".$keyword."%");
                            })
                                ->orWhere('middle_name', "LIKE", "%".$keyword."%")
                                ->orWhere('paternal_surname', "LIKE", "%".$keyword."%")
                                ->orWhere('maternal_surname', "LIKE", "%".$keyword."%");
                        });
                    });
                }
            })
            ->addColumn('student', function (Enrollment $enrollment){
                return $enrollment->student->user->full_name;
            })
            ->addColumn('grade', function (Enrollment $enrollment){
                return __($enrollment->grade->name). " / " .__($enrollment->grade->level->custom_name);
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
            ->parameters([
                'paging' => true,
                'lengthMenu'  => [[10, 20, 50, 100], [10, 20, 50, 100]],
                'searchDelay' => 1000,
            ])
            ->language([
                'url' => '//cdn.datatables.net/plug-ins/1.10.16/i18n/'.config('languages')[session('applocale')][0].'.json',
            ])
            ->setTableId('enrollmentDatatable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"card-header border-bottom p-1"<"head-label">
                    <"dt-action-buttons text-right"B>>
                    <"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l>
                    <"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i>
                    <"col-sm-12 col-md-6"p>
                    >')
            ->orderBy(0)
            ->ajax([
                'data' => 'function(d) {
                            d.levels = $("#levels").val();
                            d.grades = $("#grades").val();
                            d.dates = dates;
                        }',
            ])
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
                ->title(__('Registered'))
                ->searchable(true)
                ->orderable(true)
                ->addClass('text-center')
                ->footer(__('Registered')),
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
