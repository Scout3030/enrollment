<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\Grade;
use App\Models\Level;
use Livewire\Component;

class EnrollmentForm extends Component
{
    protected $listeners = ['getCourses' => 'updateCourses'];

    private $updated = false;
    private $grade = null;

    public function updateCourses(Grade $grade)
    {
        $this->grade = $grade;
        $this->updated = true;
    }

    public function render()
    {
        $student = auth()->user()->student;
        $level = 'default';

        if($student->grade_id && !$this->updated){
            $student->load(['grade.level'])->get();
            $this->grade = $student->grade;
            $level = [
                Level::MIDDLE_SCHOOL => 'middle-school',
                Level::HIGH_SCHOOL => 'high-school',
                Level::PROFESSIONAL_TRAINING => 'professional-training',
            ][$student->grade->level->id];
        }

        $data = self::getData();
        return view('livewire.enrollment.'.$level.'-form', with($data));
    }

    public function getCourses($type){
        return Course::whereGradeId($this->grade->id)
            ->whereCourseTypeId($type)
            ->get();
    }

    public function getData(){
        if($this->grade){
            if($this->grade->level->id == Level::MIDDLE_SCHOOL){
                return [
                    'commonCourses' => self::getCourses(CourseType::COMMON),
                    'commonOptionalCourses' => self::getCourses(CourseType::COMMON_OPTIONAL),
                    'electiveCourses' => self::getCourses(CourseType::ELECTIVE)
                ];
            }

            if($this->grade->level->id == Level::HIGH_SCHOOL){
                return [
                    'commonCourses' => self::getCourses(CourseType::COMMON),
                    'commonOptionalCourses' => self::getCourses(CourseType::COMMON_OPTIONAL),
                    'electiveCourses' => self::getCourses(CourseType::ELECTIVE),
                    'academic' => self::getCourses(CourseType::ACADEMIC),
                    'applied' => self::getCourses(CourseType::APPLIED),
                    'freeConfigurationCourses' => self::getCourses(CourseType::FREE_CONFIGURATION),
                ];
            }

            if($this->grade->level->id == Level::PROFESSIONAL_TRAINING){
                return [
                    'commonCourses' => self::getCourses(CourseType::COMMON),
                    'coreCourses' => self::getCourses(CourseType::CORE),
                    'specificCourses' => self::getCourses(CourseType::SPECIFIC),
                    'freeConfigurationCourses' => self::getCourses(CourseType::FREE_CONFIGURATION),
                ];
            }
        }

        return [
            'commonCourses' => [],
            'electiveCourses' => [],
            'commonOptionalCourses' => []
        ];
    }
}
