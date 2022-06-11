<?php

namespace App\Http\Controllers;

use App\DataTables\EnrollmentDataTable;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Enrollment;
use App\Models\AcademicPeriod;
use App\Models\Grade;
use App\Models\Level;
use Str;
use Storage;

class EnrollmentController extends Controller
{
    /**
     * @param EnrollmentDataTable $dataTable
     * @return mixed
     */
    public function index(EnrollmentDataTable $dataTable)
    {
        return $dataTable->render('enrollment.index');
    }

    public function create()
    {
        $student = auth()->user()->student;

        $student->load(['grade.level'])->get();
        $gradeId = $student->grade->id;
        $levelId = $student->grade->level->id;
        $courses = [];

        

        switch ($levelId) {
            case Level::MIDDLE_SCHOOL: {
                switch ($gradeId) {
                        case Grade::FIRST_MIDDLE_SCHOOL: {
                           
                            $commonCourses = Course::whereGradeId($gradeId)
                                ->whereCourseTypeId(CourseType::COMMON)
                                ->get();
                              
                            $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                                ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_MIDDLE_FIRST_ONE)
                                ->get();
                            
                            $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                                ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_MIDDLE_FIRST_TWO)
                                ->get();
                            return view('enrollment.create.first-middle-school',
                                compact('commonCourses', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                     }
                     case Grade::SECOND_MIDDLE_SCHOOL: {
                           
                        $commonCoursesCore = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE)
                            ->get();
                        
                        $commonCoursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC)
                            ->get();
                          
                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();
                        
                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::FREE_CONFIGURATION)
                            ->get();
                     /*   $electiveCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::ELECTIVE)
                            ->get();

                        $academicCourses = collect([]);
                        $appliedCourses = collect([]);
                        $freeConfigurationCourses = collect([]);

                        if($gradeId == Grade::FOURTH_MIDDLE_SCHOOL){
                            $academicCourses = Course::whereGradeId($gradeId)
                                ->whereCourseTypeId(CourseType::ACADEMIC)
                                ->get();
                            $appliedCourses = Course::whereGradeId($gradeId)
                                ->whereCourseTypeId(CourseType::APPLIED)
                                ->get();
                            $freeConfigurationCourses = Course::whereGradeId($gradeId)
                                ->whereCourseTypeId(CourseType::FREE_CONFIGURATION)
                                ->get();
                        }

                        return view('enrollment.create.first-middle-school',
                            compact('commonCourses', 'commonOptionalCourses', 'electiveCourses',
                                'freeConfigurationCourses', 'appliedCourses', 'academicCourses'));*/
                        return view('enrollment.create.second-school',
                            compact('commonCoursesCore','commonCoursesSpecific', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                 }
                }                            
            }
            case Level::HIGH_SCHOOL: {
                switch ($gradeId) {
                    case Grade::SECOND_HIGH_SCHOOL: {
                        $commonCoursesCore = Course::whereGradeId($gradeId)
                        ->whereCourseTypeId(CourseType::CORE)
                        ->get();
                    
                        $commonCoursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC)
                            ->get();
                        
                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();
                        
                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::FREE_CONFIGURATION)
                            ->get();

                        return view('enrollment.create.second-school',
                        compact('commonCoursesCore','commonCoursesSpecific', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                    }
                }
            }
            case Level::PROFESSIONAL_TRAINING: {
                return view('enrollment.create.professional-training', compact('courses'));
            }
            default:
                abort(403, __('No permissions'));
        }
    }

    /**
     * @param EnrollmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EnrollmentRequest $request)
    {
        $student = auth()->user()->student;
        $grade = $student->grade;
        $student->fill([
            'grade_id' => $grade->id,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null,
        ])->save();
         
        $academicPeriodId = AcademicPeriod::latest('id')->first();

        $enrollment = Enrollment::create([
            'student_id' => $student->id,
            'grade_id' => $grade->id,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null,
            'repeat_course' => $request->repeat_course,
            'bilingual' => $request->bilingual,
            'previous_school' => $request->previous_school,
            'student_signature' => $request->student_signature,
            'second_tutor_signature' => $request->second_tutor_signature,
            'first_tutor_signature' => $request->first_tutor_signature,
            'academic_period_id' => $academicPeriodId->id
        ]);

        if($student->grade_id == Grade::FIRST_MIDDLE_SCHOOL) {
            $levelCourses = Course::whereGradeId($student->grade_id)
            ->whereCourseTypeId(CourseType::COMMON)
            ->get();
            $enrollment->courses()->attach($levelCourses);
            $enrollment->courses()->attach($request->common_optional_course);
            $enrollment->courses()->attach($request->elective_courses);
        }

        if($student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || $student->grade_id == Grade::SECOND_HIGH_SCHOOL) {
            $commonCoursesCore = Course::whereGradeId($student->grade_id)
            ->whereCourseTypeId(CourseType::CORE)
            ->get();
            $commonCoursesSpecific = Course::whereGradeId($student->grade_id)
            ->whereCourseTypeId(CourseType::SPECIFIC)
            ->get();
            $enrollment->courses()->attach($commonCoursesCore);
            $enrollment->courses()->attach($commonCoursesSpecific);
            $enrollment->courses()->attach($request->common_optional_course);
            $enrollment->courses()->attach($request->elective_courses);         
        }

      /*  if($grade->id == Grade::FOURTH_MIDDLE_SCHOOL){
            $enrollment->courses()->attach($request->academic_courses);
            $enrollment->courses()->attach($request->applied_courses);
            $enrollment->courses()->attach($request->free_configuration_courses);
        }

        if($grade->level->id == Level::HIGH_SCHOOL){
            $enrollment->courses()->attach($request->core_course);
            $enrollment->courses()->attach($request->free_configuration_courses_highschool_1);
            $enrollment->courses()->attach($request->free_configuration_courses_highschool_2);
        }*/

        return redirect()->route('dashboard.index')->with('message', ['type' => 'success', 'description' => __('Registration process successfully finished')]);
    }

    public function show(Enrollment $enrollment){
        $courses = $enrollment->courses;
        $levelCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::COMMON || $value->course_type_id == CourseType::COMMON_OPTIONAL;
        });

        $electiveCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::ELECTIVE;
        });

        $academicCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::ACADEMIC;
        });

        $appliedCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::APPLIED;
        });

        $freeConfigurationCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::FREE_CONFIGURATION;
        });

        $specificFreeConfigurationCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::SPECIFIC_FREE_CONFIGURATION;
        });

        $coreCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::CORE;
        });

        return view('enrollment.show',
            compact('enrollment', 'levelCourses',
                'electiveCourses', 'academicCourses', 'appliedCourses', 'freeConfigurationCourses',
                'specificFreeConfigurationCourses', 'coreCourses')
        );
    }

    public function export(Enrollment $enrollment){
        $pdf = \PDF::loadView('template_pdf.enrollment', ['enrollment' => $enrollment]);
        $pdfName = Str::slug($enrollment->student->user->name.' '.$enrollment->student->paternal_surname.' '.$enrollment->student->maternal_surname,'-');
        return $pdf->download($pdfName.'.pdf');
    }

    public function signature()
    {
        $baseFrom = request()->sign;
        $img = getB64Image($baseFrom);
        $extension = getB64Extension($baseFrom);
        $imageName = 'sign'. time() . '.' . $extension;
        Storage::put('signatures/' . $imageName, $img);
        return response()->json(['status' => __('Signature register successfully'), 'name'=> $imageName]);
    }
}
