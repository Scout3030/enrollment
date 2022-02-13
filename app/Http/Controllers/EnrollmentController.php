<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function store(EnrollmentRequest $request)
    {
        auth()->user()->student->fill([
            'grade_id' => $request->grade_id,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null
        ])->save();

        $enrollment = Enrollment::create([
            'student_id' => auth()->user()->student->id,
            'grade_id' => $request->grade_id,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null
        ]);

        $levelCourses = Course::whereGradeId($request->grade_id)
            ->whereType(Course::MANDATORY)
            ->get();

        $enrollment->courses()->attach($levelCourses);
        $enrollment->courses()->attach($request->mandatory_optional_course);
        $enrollment->courses()->attach($request->optional_courses);

        return back()->with('message', ['type' => 'success', 'description' => __('Registration process successfully finished')]);
    }
}
