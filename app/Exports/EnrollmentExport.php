<?php

namespace App\Exports;

use App\Models\Enrollment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrollmentExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Enrollment::with(['student.user', 'courses']);

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

        return $query->get();
    }

    public function headings(): array
    {
        return [
            '#',
            __('Student'),
            __('Email'),
            __('DNI'),
            __('Level'),
            __('Grade'),
            __('Courses'),
            __('Registered at'),
        ];
    }

    public function map($row): array
    {
        $student = $row['student']['user']['name']." ".$row['student']['middle_name']." ".$row['student']['paternal_surname']." ".$row['student']['maternal_surname'];
        $list = '';
        foreach ($row['courses'] as $key => $course){
            if($key+1 == count($row['courses'])){
                $list .= $course['name'];
            } else {
                $list .= $course['name']."\r\n";
            }
        }

        return [
            $row['id'],
            $student,
            $row['student']['user']['email'],
            $row['student']['dni'],
            $row['grade']['level']['custom_name'],
            $row['grade']['name'],
            $list,
            $row['created_at']->format('Y-m-d H:i'),
        ];
    }
}
