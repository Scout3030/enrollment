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

        $commonCourses = Course::whereGradeId($gradeId)
            ->whereCourseTypeId(CourseType::COMMON)
            ->get();

        switch ($levelId) {
            case Level::MIDDLE_SCHOOL: {
                $commonOptionalCourses = Course::whereGradeId($gradeId)
                    ->whereCourseTypeId(CourseType::COMMON_OPTIONAL)
                    ->get();

                $electiveCourses = Course::whereGradeId($gradeId)
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

                return view('enrollment.create.middle-school',
                    compact('commonCourses', 'commonOptionalCourses', 'electiveCourses',
                        'freeConfigurationCourses', 'appliedCourses', 'academicCourses'));
            }
            case Level::HIGH_SCHOOL: {
                $coreCourses = Course::whereGradeId($gradeId)
                    ->whereCourseTypeId(CourseType::CORE)
                    ->get();

                $hours4Courses = Course::whereGradeId($gradeId)
                    ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                    ->whereDuration(4)
                    ->get();

                $hours3Courses = Course::whereGradeId($gradeId)
                    ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                    ->whereDuration(3)
                    ->get();

                $hours1Courses = Course::whereGradeId($gradeId)
                    ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                    ->whereDuration(1)
                    ->get();

                return view('enrollment.create.high-school',
                    compact('commonCourses', 'coreCourses', 'hours4Courses',
                        'hours3Courses', 'hours1Courses'));
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

        $levelCourses = Course::whereGradeId($student->grade_id)
            ->whereCourseTypeId(CourseType::COMMON)
            ->get();

        $enrollment->courses()->attach($levelCourses);

        if($grade->level->id == Level::MIDDLE_SCHOOL) {
            $enrollment->courses()->attach($request->common_optional_course);
            $enrollment->courses()->attach($request->elective_courses);
        }

        if($grade->id == Grade::FOURTH_MIDDLE_SCHOOL){
            $enrollment->courses()->attach($request->academic_courses);
            $enrollment->courses()->attach($request->applied_courses);
            $enrollment->courses()->attach($request->free_configuration_courses);
        }

        if($grade->level->id == Level::HIGH_SCHOOL){
            $enrollment->courses()->attach($request->core_course);
            $enrollment->courses()->attach($request->free_configuration_courses_highschool_1);
            $enrollment->courses()->attach($request->free_configuration_courses_highschool_2);
        }

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
