<?php

// From https://yajrabox.com/docs/laravel-datatables/master/buttons-laravel-excel

namespace App\Exports;

use App\Models\AcademicPeriod;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AcademicPeriodExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return AcademicPeriod::all();
    }

    public function headings(): array
    {
        return [
            '#',
            __('Name'),
            __('Status'),
            __('Start at'),
            __('Finish at'),
        ];
    }

    public function map($row): array
    {
        $status = $row['status'] == 1 ? __('Active noun') : __('Inactive noun');
        return [
            $row['id'],
            $row['name'],
            $status,
            $row['started_at']->format('Y-m-d H:i'),
            $row['finished_at']->format('Y-m-d H:i'),
        ];
    }
}
