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
           if($this->active==1){
                $freeConfigurationCoursesHighschool_1 = [];
                foreach($this->hour_4_course as $key => $free_configurationCourse_1){
                    $free_configurationCourse_1 = json_decode($free_configurationCourse_1);
                    $freeConfigurationCoursesHighschool_1[$key]['course_id'] = $free_configurationCourse_1->id;
                    $freeConfigurationCoursesHighschool_1[$key]['order'] = $free_configurationCourse_1->order;
                }
                $this->merge([
                    'free_configuration_courses_highschool_1' => $freeConfigurationCoursesHighschool_1,
                ]);

                $freeConfigurationCoursesHighschool_2 = [];
                foreach($this->hour_3_course as $key => $free_configurationCourse_2){
                    $free_configurationCourse_2 = json_decode($free_configurationCourse_2);
                    $freeConfigurationCoursesHighschool_2[$key]['course_id'] = $free_configurationCourse_2->id;
                    $freeConfigurationCoursesHighschool_2[$key]['order'] = $free_configurationCourse_2->order;
                }
                $this->merge([
                    'free_configuration_courses_highschool_2' => $freeConfigurationCoursesHighschool_2,
                ]);
            }
            else
            {
                $freeConfigurationCoursesHighschool_1 = [];
                foreach($this->b_hour_1_course as $key => $free_configurationCourse_1){
                    $free_configurationCourse_1 = json_decode($free_configurationCourse_1);
                    $freeConfigurationCoursesHighschool_1[$key]['course_id'] = $free_configurationCourse_1->id;
                    $freeConfigurationCoursesHighschool_1[$key]['order'] = $free_configurationCourse_1->order;
                }
                $this->merge([
                    'free_configuration_courses_highschool_1' => $freeConfigurationCoursesHighschool_1,
                ]);

                $freeConfigurationCoursesHighschool_2 = [];
                foreach($this->b_hour_3_courses as $key => $free_configurationCourse_2){
                    $free_configurationCourse_2 = json_decode($free_configurationCourse_2);
                    $freeConfigurationCoursesHighschool_2[$key]['course_id'] = $free_configurationCourse_2->id;
                    $freeConfigurationCoursesHighschool_2[$key]['order'] = $free_configurationCourse_2->order;
                }
                $this->merge([
                    'free_configuration_courses_highschool_2' => $freeConfigurationCoursesHighschool_2,
                ]);


            }
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
                'common_optional_course' => ['required', 'exists:courses,id'],
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
                'free_configuration_courses_highschool_2' => ['required', 'array'],
                'free_configuration_courses_highschool_2.*.course_id' => 'exists:courses,id',
                'free_configuration_courses_highschool_1' => ['required', 'array'],
                'free_configuration_courses_highschool_1.*.course_id' => 'exists:courses,id',
            ];
        }
        return [];
    }
}
