<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\StudentRequest;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Student $student){
        $student->load('user')->get();
        return view('student.show', compact('student'));
    }

    /**
     * @param Student $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Student $student){
        $student->load('user')->get();
        return view('student.edit', compact('student'));
    }

    /**
     * @param StudentRequest $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, Student $student): \Illuminate\Http\RedirectResponse
    {
        $student->fill($request->input())->save();
        return back()->with('message', [
            'type' => 'success', 'description' => __('Student edited successfully')
        ]);
    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile(ProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        $student = $user->student;
        $student->country_id = $request->country_id;
        $student->middle_name = $request->middle_name;
        $student->paternal_surname = $request->paternal_surname;
        $student->maternal_surname = $request->maternal_surname;
        $student->dni = $request->dni;
        $student->birth = $request->birth;
        $student->address = $request->address;
        $student->address_number = $request->address_number;
        $student->door = $request->door;
        $student->stair = $request->stair;
        $student->floor = $request->floor;
        $student->letter = $request->letter;
        $student->postal_code = $request->postal_code;
        $student->first_tutor_dni = $request->first_tutor_dni;
        $student->first_tutor_full_name = $request->first_tutor_full_name;
        $student->first_tutor_phone_number = $request->first_tutor_phone_number;
        $student->first_tutor_email = $request->first_tutor_email;
        $student->first_tutor_address = $request->first_tutor_address;
        $student->second_tutor_dni = $request->second_tutor_dni;
        $student->second_tutor_full_name = $request->second_tutor_full_name;
        $student->second_tutor_phone_number = $request->second_tutor_phone_number;
        $student->second_tutor_email = $request->second_tutor_email;
        $student->second_tutor_address = $request->second_tutor_address;
        $student->save();

        return redirect()->route('profile.show')->with('message', [
            'type' => 'success', 'description' => __('Profile edited successfully')
        ]);
    }
}
