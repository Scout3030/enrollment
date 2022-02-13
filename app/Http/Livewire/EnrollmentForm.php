<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Grade;
use Livewire\Component;

class EnrollmentForm extends Component
{
    protected $listeners = ['getCourses' => 'updateCourses'];

    private $levelCourses;
    private $mandatoryOptionalCourses;
    private $optionalCourses;
    private $updated = false;

    public function updateCourses(Grade $grade)
    {
        $this->levelCourses = Course::whereGradeId($grade->id)
            ->whereType(Course::MANDATORY)
            ->get();
        $this->mandatoryOptionalCourses= Course::whereGradeId($grade->id)
            ->whereType(Course::MANDATORY_OPTIONAL)
            ->get();
        $this->optionalCourses = Course::whereGradeId($grade->id)
            ->whereType(Course::OPTIONAL)
            ->get();
        $this->updated = true;
    }

    public function render()
    {
        $levelCourses = [];
        $mandatoryOptionalCourses = [];
        $optionalCourses = [];

        $student = auth()->user()->student;
        if($student->grade_id){
            $levelCourses = Course::whereGradeId($student->grade_id)
                ->whereType(Course::MANDATORY)
                ->get();
            $mandatoryOptionalCourses = Course::whereGradeId($student->grade_id)
                ->whereType(Course::MANDATORY_OPTIONAL)
                ->get();
            $optionalCourses = Course::whereGradeId($student->grade_id)
                ->whereType(Course::OPTIONAL)
                ->get();
        }

        if($this->updated && !$student->grade_id){
            $levelCourses = $this->levelCourses;
            $mandatoryOptionalCourses = $this->mandatoryOptionalCourses;
            $optionalCourses = $this->optionalCourses;
        }

        return view('livewire.enrollment-form', with([
            'levelCourses' => $levelCourses,
            'optionalCourses' => $optionalCourses,
            'mandatoryOptionalCourses' => $mandatoryOptionalCourses
        ]));
    }
}
