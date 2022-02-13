<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Grade;
use Livewire\Component;

class EnrollmentForm extends Component
{
    protected $listeners = ['getCourses' => 'updateCourses'];

    private $levelCourses;
    private $optionalCourses;
    private $updated = false;

    public function updateCourses(Grade $grade)
    {
        $this->levelCourses = Course::whereGradeId($grade->id)
            ->whereType(Course::MANDATORY)
            ->get();
        $this->optionalCourses = Course::whereGradeId($grade->id)
            ->whereType(Course::MANDATORY)
            ->get();
        $this->updated = true;
    }

    public function render()
    {
        $levelCourses = [];
        $optionalCourses = [];
        if($this->updated){
            $levelCourses = $this->levelCourses;
            $optionalCourses = $this->optionalCourses;
        }
        return view('livewire.enrollment-form', with([
            'levelCourses' => $levelCourses,
            'optionalCourses' => $optionalCourses,
        ]));
    }
}
