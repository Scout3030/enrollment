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
        if(auth()->user()->student->grade->level->id == Level::MIDDLE_SCHOOL) {
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

        if(auth()->user()->student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            $academicCourses = [];
            foreach($this->academic_courses as $key => $academicCourse){
                $academicCourse = json_decode($academicCourse);
                $academicCourses[$key]['course_id'] = $academicCourse->id;
                $academicCourses[$key]['order'] = $academicCourse->order;
            }
            $this->merge([
                'academic_courses' => $academicCourses,
            ]);

            $appliedCourses = [];
            foreach($this->applied_courses as $key => $appliedCourse){
                $appliedCourse = json_decode($appliedCourse);
                $appliedCourses[$key]['course_id'] = $appliedCourse->id;
                $appliedCourses[$key]['order'] = $appliedCourse->order;
            }
            $this->merge([
                'applied_courses' => $appliedCourses,
            ]);

            $freeConfigurationCourses = [];
            foreach($this->free_configuration_courses as $key => $free_configurationCourse){
                $free_configurationCourse = json_decode($free_configurationCourse);
                $freeConfigurationCourses[$key]['course_id'] = $free_configurationCourse->id;
                $freeConfigurationCourses[$key]['order'] = $free_configurationCourse->order;
            }
            $this->merge([
                'free_configuration_courses' => $freeConfigurationCourses,
            ]);
        }

        if(auth()->user()->student->grade->level->id == Level::HIGH_SCHOOL) {
            $specificFreeConfigurationCourses = [];

            if($this->hour_4_course && $this->hour_3_course) {
                $hour4Course = json_decode($this->hour_4_course);
                $specificFreeConfigurationCourses[0]['course_id'] = $hour4Course->id;
                $specificFreeConfigurationCourses[0]['order'] = $hour4Course->order;

                $hour3Course = json_decode($this->hour_3_course);
                $specificFreeConfigurationCourses[1]['course_id'] = $hour3Course->id;
                $specificFreeConfigurationCourses[1]['order'] = $hour3Course->order;
            }

            if($this->b_hour_1_course && $this->b_hour_3_courses) {
                $bHour1Course = json_decode($this->b_hour_1_course);
                $specificFreeConfigurationCourses[0]['course_id'] = $bHour1Course->id;
                $specificFreeConfigurationCourses[0]['order'] = $bHour1Course->order;

                foreach($this->b_hour_3_courses as $key => $bHour3Course){
                    $bHour3Course = json_decode($bHour3Course);
                    $specificFreeConfigurationCourses[$key + 1]['course_id'] = $bHour3Course->id;
                    $specificFreeConfigurationCourses[$key + 1]['order'] = $bHour3Course->order;
                }
            }

            $this->merge([
                'specific_free_configuration_courses' => $specificFreeConfigurationCourses,
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
        if(auth()->user()->student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function (){
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'academic_courses' => ['required', 'array', new ValidOrderRule()],
                'academic_courses.*.course_id' => 'exists:courses,id',
                'applied_courses' => ['required', 'array', new ValidOrderRule()],
                'applied_courses.*.course_id' => 'exists:courses,id',
                'free_configuration_courses' => ['required', 'array', new ValidOrderRule()],
                'free_configuration_courses.*.course_id' => 'exists:courses,id',
            ];
        }
        if(auth()->user()->student->grade->level->id == Level::MIDDLE_SCHOOL) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
            ];
        }
        if(auth()->user()->student->grade->level->id == Level::HIGH_SCHOOL) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'core_course' => ['required', 'exists:courses,id'],
                'specific_free_configuration_courses' => ['required', 'array', new ValidHoursRule()],
                'specific_free_configuration_courses.*.course_id' => 'exists:courses,id',
            ];
        }
        return [];
    }
}
