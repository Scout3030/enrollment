<?php

namespace App\Http\Requests;

use App\Models\Grade;
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
        $student = auth()->user()->student;

        if($student->grade_id == Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES) {
           //  dd($this->core_itinerary_a5,$this->core_itinerary_b5,$this->core_itinerary_c5,$this->active1);
             if($this->active1==1){
                 $course_A = $this->core_itinerary_a5;
             }
             if($this->active1==0){
                 $course_A = $this->core_itinerary_b5;
                 $electiveCoursesFree = [];
                 foreach($this->core_itinerary_c5 as $key => $electiveCourseFree){
                     $electiveCourseFree = json_decode($electiveCourseFree);
                     $electiveCoursesFree[$key]['course_id'] = $electiveCourseFree->id;
                     $electiveCoursesFree[$key]['order'] = $electiveCourseFree->order;
                 }
     
                 $this->merge([
                     'elective_courses_free' => $electiveCoursesFree,
                 ]);
             }
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

        if($student->grade_id == Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY || $student->grade_id == Grade::FIRST_HIGH_SCHOOL_GENERAL) {
           // dd($this->core_itinerary_a,$this->core_itinerary_b,$this->core_itinerary_c,$this->active);
            if($this->active==1){
                $course_A = $this->core_itinerary_a;
            }
            if($this->active==0){
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
            }
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
                $electiveCoursesFree[$key]['course_id'] = $electiveCourseFree->id;
                $electiveCoursesFree[$key]['order'] = $electiveCourseFree->order;
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
                'first_tutor_signature'=>['required'],
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
                'elective_courses_free' => ['required', 'array', new ValidOrderRule()],
                'elective_courses_free.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['required'],
                'student_signature'=>['required'],
            ];
        }

        if( $student->grade_id == Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY || 
        $student->grade_id == Grade::FIRST_HIGH_SCHOOL_GENERAL) {
            return [
                'bus_stop_id' => [Rule::requiredIf(function () {
                    return $this->transportation == 1;
                }), 'exists:bus_stops,id'],
                'active'=> ['required'],
                'modality'=> ['required'],               
                'one_courses' =>['required'],
                'elective_courses' => ['required', 'array', new ValidOrderRule()],
                'elective_courses.*.course_id' => 'exists:courses,id',
                'elective_courses_free' => ['required', 'array', new ValidOrderRule()],
                'elective_courses_free.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['required'],
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
                'elective_courses_free' => ['required', 'array', new ValidOrderRule()],
                'elective_courses_free.*.course_id' => 'exists:courses,id',
                'first_tutor_signature'=>['required'],
                'student_signature'=>['required'],
            ];
        }

        return [];
    }
}
