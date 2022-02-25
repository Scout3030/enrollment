<?php

namespace App\Http\Controllers;

use App\DataTables\CourseDataTable;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\UserResource;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    /**
     * @param CourseDataTable $dataTable
     * @return mixed
     */
    public function index(CourseDataTable $dataTable)
    {
        return $dataTable->render('course.index');
    }

    public function create()
    {
        $course = new Course();
        return view('course.form', compact('course'));
    }

    /**
     * @param CourseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CourseRequest $request): \Illuminate\Http\RedirectResponse
    {
        Course::create([
            'name' => $request->name,
            'type' => $request->type,
            'grade_id' => $request->grade_id,
            'description' => $request->description,
            'bilingual' => $request->bilingual,
        ]);

        return back()->with('message', ['type' => 'success', 'description' => __('Course created successfully')]);
    }

    public function edit(Course $course)
    {
        return view('course.form', compact('course'));
    }

    /**
     * @param CourseRequest $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CourseRequest $request, Course $course): \Illuminate\Http\RedirectResponse
    {
        $course->fill($request->input())->save();

        return back()->with('message', ['type' => 'success', 'description' => __('Course edited successfully')]);
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Course $course): \Illuminate\Http\JsonResponse
    {
        $course->delete();
        return response()->json(__('User deleted successfully'));
    }
}
