<?php

namespace App\Exports;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\CourseType;
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
          //   THIRD_HIGH_SCHOOL
            __('Ámbitos comunes'),
          //  FIRST_MIDDLE_SCHOOL - THIRD_MIDDLE_SCHOOL
            __('Materias comunes'),
            __('Materias optativas (Númeradas por orden de preferencia)'),
            __('Materias optativas (Seleccionada)'),
          //   SECOND_MIDDLE_SCHOOL - SECOND_HIGH_SCHOOL
            __('Troncales'),
            __('Específicas (Obligatorias)'),
            __('Específica (Seleccionada)'),
            __('Libre configuración (Númeradas por orden de preferencia)'),
         //   FOURTH_MIDDLE_SCHOOL
            __('Cursos itinerarios'),
            __('Cursos específicos itineraros'),
            __('Cursos libre configuración itineraros'),
        // FIRST_EDUCATIONAL_CYCLE_BASIC - SECOND_EDUCATIONAL_CYCLE_BASIC
            __('MODULES ASSOCIATED WITH UNITS OF COMPETENCE'),
            __('MODULES ASSOCIATED WITH COMMON BLOCKS'),
            __('TRAINING MODULES IN WORK CENTERS'),
        // FIRST_EDUCATIONAL_CYCLE_MEDIUM - SECOND_EDUCATIONAL_CYCLE_MEDIUM
           __('courses required'),

            __('Registered at'),
        ];
    }

    public function map($row): array
    {
        $student = $row['student']['user']['name']." ".$row['student']['middle_name']." ".$row['student']['paternal_surname']." ".$row['student']['maternal_surname'];
        $list1 = '';$list2 = '';$list3 = '';$list4 = '';$list5 = '';$list6 = '';$list7 = '';$list8 = '';$list8 = '';$list9 = '';
        $list10 = '';$list11 = '';$list12 = '';$list13 = '';$list14 = '';$list15 = '';
       
        foreach ($row['courses'] as $key => $course){
           // dd($row['courses'],$course['name'],$course['grade_id'],$course['course_type_id'],$course['pivot']['order']);
           
            if ($course['grade_id'] == Grade::FIRST_MIDDLE_SCHOOL || $course['grade_id'] == Grade::THIRD_MIDDLE_SCHOOL
                || $course['grade_id'] == Grade::THIRD_HIGH_SCHOOL){
                if(CourseType::COMMON == $course['course_type_id']){
                    $list1 .= $course['name']."\r\n";
                }
                if(CourseType::COMMON_OPTIONAL_ONE == $course['course_type_id']){
                    $list2 .= $course['pivot']['order'].". ".$course['name']."\r\n";
                }
                if(CourseType::COMMON_OPTIONAL_TWO == $course['course_type_id']){
                    $list3 .= $course['name']."\r\n";
                }
                if(CourseType::COMMON_AREAS == $course['course_type_id']){
                    $list8 .= $course['name']."\r\n";
                }
            }else{
                $list1 .= '-';
                $list2 .= '-';
                $list3 .= '-';
                $list8 .= '-';
            }

            if ($course['grade_id'] == Grade::SECOND_MIDDLE_SCHOOL || $course['grade_id'] == Grade::SECOND_HIGH_SCHOOL ||
            $course['grade_id'] == Grade::FOURTH_MIDDLE_SCHOOL){
                if(CourseType::CORE == $course['course_type_id']){
                    $list4 .= $course['name']."\r\n";
                }
                if(CourseType::SPECIFIC == $course['course_type_id']){
                    $list5 .= $course['name']."\r\n";
                }
                if(CourseType::SPECIFIC_FREE_CONFIGURATION == $course['course_type_id']){
                    $list6 .= $course['name']."\r\n";
                }
                if(CourseType::FREE_CONFIGURATION == $course['course_type_id']){
                    $list7 .= $course['pivot']['order'].". ".$course['name']."\r\n";
                }
                if(CourseType::ITINERARY == $course['course_type_id']){
                    $list9 .= $course['name']."\r\n";
                }
                if(CourseType::SPECIFIC_ITINERARY == $course['course_type_id']){
                    $list10 .= $course['pivot']['order'].". ".$course['name']."\r\n";
                }
                if(CourseType::FREE_CONFIGURATION_ITINERARY == $course['course_type_id']){
                    $list11 .= $course['pivot']['order'].". ".$course['name']."\r\n";
                }
            }else{
                $list4 .= '-';
                $list5 .= '-';
                $list6 .= '-';
                $list7 .= '-';
                $list9 .= '-';
                $list10 .= '-';
                $list11 .= '-';
            }

            if ($course['grade_id'] == Grade::FIRST_EDUCATIONAL_CYCLE_BASIC || $course['grade_id'] == Grade::SECOND_EDUCATIONAL_CYCLE_BASIC){
                if(CourseType::ASSOCIATED_UNITS_OF_COMPETENCES == $course['course_type_id']){
                    $list12 .= $course['name']."\r\n";
                }
                if(CourseType::ASSOCIATED_COMMON_BLOCKS == $course['course_type_id']){
                    $list13 .= $course['name']."\r\n";
                }
                if(CourseType::FORMATION_WORKSPACE == $course['course_type_id']){
                    $list14 .= $course['pivot']['order'].". ".$course['name']."\r\n";
                }
                
            }else{
                $list12 .= '-';
                $list13 .= '-';
                $list14 .= '-';
             
            }
            
            if ($course['grade_id'] == Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM || $course['grade_id'] == Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM){
                if(CourseType::CF_COMMON == $course['course_type_id']){
                    $list15 .= $course['name']."\r\n";
                }    
                
            }else{
                $list15 .= '-';              
             
            }
         
        }

        return [
            $row['id'],
            $student,
            $row['student']['user']['email'],
            $row['student']['dni'],
            $row['grade']['level']['custom_name'],
            $row['grade']['name'],
            $list8,
            $list1,
            $list2,
            $list3,
            $list4,
            $list5,
            $list6,
            $list7,
            $list9,
            $list10,
            $list11,
            $list12,
            $list13,
            $list14,
            $list15,      

            $row['created_at']->format('Y-m-d H:i'),
        ];
    }
}
