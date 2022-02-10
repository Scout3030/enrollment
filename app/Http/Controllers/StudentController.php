<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * @param StudentDataTable $dataTable
     * @return mixed
     */
    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('student.index');
    }

    /**
     * @param Student $student
     * @return UserResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Student $student)
    {
        if(request()->ajax()){
            return new UserResource($student);
        }
        return view('student.show', $student);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $student->assignRole($request->role);

        return back()->with('message', ['type' => 'success', 'description' => __('User created successfully')]);
    }

    /**
     * @param UserRequest $request
     * @param User $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $student): \Illuminate\Http\RedirectResponse
    {
        $data = ['name' => $request->name];

        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }

        $student->fill($data)->save();
        $student->assignRole($request->role);

        return back()->with('message', ['type' => 'success', 'description' => __('User edited successfully')]);
    }

    /**
     * @param User $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $student): \Illuminate\Http\JsonResponse
    {
        $student->delete();
        return response()->json(__('User deleted successfully'));
    }
}
