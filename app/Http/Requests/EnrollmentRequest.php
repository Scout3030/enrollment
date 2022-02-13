<?php

namespace App\Http\Requests;

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
        $this->merge([
            'grade_id' => auth()->user()->student->grade_id ?? $this->grade_id,
        ]);

        $optionalCourses = [];
        foreach($this->optional_courses as $key => $optionalCourse){
            $optionalCourse = json_decode($optionalCourse);
            $optionalCourses[$key]['course_id'] = $optionalCourse->id;
            $optionalCourses[$key]['order'] = $optionalCourse->order;
        }
        $this->merge([
            'optional_courses' => $optionalCourses,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'grade_id' => 'required|exists:grades,id',
            'bus_stop_id' => [Rule::requiredIf(function (){
                return $this->transportation == 1;
            }), 'exists:bus_stops,id'],
            'optional_courses' => ['required', 'array', new ValidOrderRule()],
            'optional_courses.*.course_id' => 'exists:courses,id',
        ];
    }
}
