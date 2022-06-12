<?php

namespace App\Http\Requests;

use App\Models\Grade;
use App\Models\Level;
use App\Rules\ValidHoursRule;
use App\Rules\ValidOrderRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrollmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if(auth()->user()->student->grade_id == Grade::FIRST_MIDDLE_SCHOOL ||
           auth()->user()->student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || 
           auth()->user()->student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
           auth()->user()->student->grade_id == Grade::SECOND_HIGH_SCHOOL ||
           auth()->user()->student->grade_id == Grade::THIRD_HIGH_SCHOOL && 
           $this->elective_courses && $this->common_optional_course) {
            $electiveCourses = [];    
            foreach($this->elective_courses as $key => $electiveCourse){
                $electiveCourse = json_decode($electiveCourse);
                $electiveCourses[$key]['course_id'] = $electiveCourse->id;
                $electiveCourses[$key]['order'] = $electiveCourse->order;
            }

            $this->merge([
                'elective_courses' => $electiveCourses,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         if(auth()->user()->student->grade_id == Grade::FIRST_MIDDLE_SCHOOL || 
           auth()->user()->student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || 
           auth()->user()->student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || 
           auth()->user()->student->grade_id == Grade::THIRD_HIGH_SCHOOL || 
           auth()->user()->student->grade_id == Grade::SECOND_HIGH_SCHOOL ) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'common_optional_course' => ['required', 'exists:courses,id'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['required'],
                'student_signature'=>['required'],
            ];
        }       
        return [];
    }
}
