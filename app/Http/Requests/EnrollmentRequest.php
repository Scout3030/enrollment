<?php

namespace App\Http\Requests;

use App\Models\Grade;
use App\Rules\ValidOrderRule;
use App\Rules\ArrayCheck;
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
        $student = auth()->user()->student;

        if($student->grade_id == Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES ||
            $student->grade_id == Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES) {
            if($this->active1==1){
                $course_A = $this->core_itinerary_a5;
            }
            if($this->active1==0){
                $course_A = $this->core_itinerary_b5;
                $electiveCoursesFree = [];
                if($this->core_itinerary_c5){
                    foreach($this->core_itinerary_c5 as $key => $electiveCourseFree){
                        $electiveCourseFree = json_decode($electiveCourseFree);
                        $electiveCoursesFree[$key]['course_id'] = $electiveCourseFree->id;
                        $electiveCoursesFree[$key]['order'] = $electiveCourseFree->order;
                    }
                }

                $this->merge([
                    'elective_courses_free' => $electiveCoursesFree,
                ]);
            }
            $electiveCourses = [];
            if($course_A){
                foreach($course_A as $key => $electiveCourse){
                    $electiveCourse = json_decode($electiveCourse);
                    $electiveCourses[$key]['course_id'] = $electiveCourse->id;
                    $electiveCourses[$key]['order'] = $electiveCourse->order;
                }
            }

            $this->merge([
                'elective_courses' => $electiveCourses,
            ]);
        }

        if($student->grade_id == Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY || $student->grade_id == Grade::FIRST_HIGH_SCHOOL_GENERAL ||
            $student->grade_id == Grade::SECOND_HIGH_SCHOOL_SCIENCE ) {
            if($this->active==1 && $this->core_itinerary_a){
                $course_A = $this->core_itinerary_a;
                $electiveCourses = [];
                foreach($course_A as $key => $electiveCourse){
                    $electiveCourse = json_decode($electiveCourse);
                    $electiveCourses[$key]['course_id'] = $electiveCourse->id;
                    $electiveCourses[$key]['order'] = $electiveCourse->order;
                }

                $this->merge([
                    'elective_courses' => $electiveCourses,
                ]);
            }
            if($this->active==0 && $this->core_itinerary_b && $this->core_itinerary_c){
                $course_A = $this->core_itinerary_b;
                $electiveCoursesFree = [];
                foreach($this->core_itinerary_c as $key => $electiveCourseFree){
                    $electiveCourseFree = json_decode($electiveCourseFree);
                    $electiveCoursesFree[$key]['course_id'] = $electiveCourseFree->id;
                    $electiveCoursesFree[$key]['order'] = $electiveCourseFree->order;
                }

                $this->merge([
                    'elective_courses_free' => $electiveCoursesFree,
                ]);
                $electiveCourses = [];
                foreach($course_A as $key => $electiveCourse){
                    $electiveCourse = json_decode($electiveCourse);
                    $electiveCourses[$key]['course_id'] = $electiveCourse->id;
                    $electiveCourses[$key]['order'] = $electiveCourse->order;
                }

                $this->merge([
                    'elective_courses' => $electiveCourses,
                ]);
            }
        }

        if($student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            $electiveCourses = [];
            foreach($this->elective_courses as $key => $electiveCourse){
                $electiveCourse = json_decode($electiveCourse);
                $electiveCourses[$key]['course_id'] = $electiveCourse->id;
                $electiveCourses[$key]['order'] = $electiveCourse->order;
            }

            $this->merge([
                'elective_courses' => $electiveCourses,
            ]);

            $electiveCoursesFree = [];
            foreach($this->elective_courses_free as $key => $electiveCourseFree){
                $electiveCourseFree = json_decode($electiveCourseFree);
                if($electiveCourseFree->id == "0"){
                    $this->merge([
                        'free_info_order' => $electiveCourseFree->order,
                    ]);
                } else {
                    $electiveCoursesFree[$key]['course_id'] = $electiveCourseFree->id;
                    $electiveCoursesFree[$key]['order'] = $electiveCourseFree->order;
                }

            }

            $this->merge([
                'elective_courses_free' => $electiveCoursesFree,
            ]);
        }
        if($student->grade_id == Grade::FIRST_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::SECOND_HIGH_SCHOOL ||
            $student->grade_id == Grade::THIRD_HIGH_SCHOOL &&
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
        $student = auth()->user()->student;
        if($student->grade_id == Grade::FIRST_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::THIRD_HIGH_SCHOOL ||
            $student->grade_id == Grade::SECOND_HIGH_SCHOOL ) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'common_optional_course' => ['required', 'exists:courses,id'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }
        if( $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'active'=> ['required'],
                'common_courses' =>['required'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'elective_courses_free' => ['required', 'array'],
                'elective_courses_free.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['nullable'],
                'free_info'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }

        if( $student->grade_id == Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'active'=> ['required'],
                'modality'=> ['required'],
                'one_courses' =>['required'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }
        if($student->grade_id == Grade::FIRST_HIGH_SCHOOL_GENERAL) {
        return [
            'bus_stop_id' => [Rule::requiredIf(function () {
                return $this->transportation == 1;
            }), 'exists:bus_stops,id'],
            'active'=> ['required'],
            'modality'=> ['required'],
            'one_courses' =>['required', new ArrayCheck],
            'elective_courses' => ['required', 'array', new ValidOrderRule()],
            'elective_courses.*.course_id' => 'exists:courses,id',
            'first_tutor_signature'=>['nullable'],
            'student_signature'=>['required'],
        ];
    }

        if( $student->grade_id == Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'active'=> ['required'],
                'active1'=> ['required'],
                'modality'=> ['required'],

                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }

        if( $student->grade_id == Grade::SECOND_HIGH_SCHOOL_SCIENCE ||
            $student->grade_id == Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'active'=> ['required'],
                'active1'=> ['required'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }

        if( $student->grade_id == Grade::FIRST_EDUCATIONAL_CYCLE_BASIC ||
            $student->grade_id == Grade::SECOND_EDUCATIONAL_CYCLE_BASIC) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'first_tutor_signature'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }

        if( $student->grade_id == Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM ||
            $student->grade_id == Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'first_tutor_signature'=>['nullable'],
                'student_signature'=>['required'],
            ];
        }

        return [];
    }
}
