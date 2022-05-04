<?php

namespace App\Http\Controllers;

use App\DataTables\EnrollmentDataTable;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Level;

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
                $commonCourses = Course::whereGradeId($gradeId)
                    ->whereCourseTypeId(CourseType::COMMON)
                    ->get();

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
                return view('enrollment.create.high-school', compact('courses'));
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
        $gradeId = auth()->user()->student->grade_id;

        auth()->user()->student->fill([
            'grade_id' => $gradeId,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null,
        ])->save();

        $enrollment = Enrollment::create([
            'student_id' => auth()->user()->student->id,
            'grade_id' => $gradeId,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null,
            'repeat_course' => $request->repeat_course,
            'bilingual' => $request->bilingual,
            'previous_school' => $request->previous_school,
        ]);

        $levelCourses = Course::whereGradeId($request->grade_id)
            ->whereCourseTypeId(CourseType::COMMON)
            ->get();

        $enrollment->courses()->attach($levelCourses);
        $enrollment->courses()->attach($request->mandatory_optional_course);
        $enrollment->courses()->attach($request->elective_courses);

        if($gradeId == Grade::FOURTH_MIDDLE_SCHOOL){
            $enrollment->courses()->attach($request->academic_courses);
            $enrollment->courses()->attach($request->applied_courses);
            $enrollment->courses()->attach($request->free_configuration_courses);
        }

        return redirect()->route('dashboard.index')->with('message', ['type' => 'success', 'description' => __('Registration process successfully finished')]);
    }

    public function show(Enrollment $enrollment){
        $courses = $enrollment->courses;
        $levelCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::COMMON;
        });
//        dd($levelCourses, $courses);
        return view('enrollment.show', compact('enrollment', 'levelCourses'));
    }
}
