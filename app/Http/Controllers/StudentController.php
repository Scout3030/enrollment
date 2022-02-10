<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\ProfileRequest;
use App\Models\Student;
use App\Models\User;

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

    public function profile(ProfileRequest $request)
    {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->save();

        $student = Student::where('user_id', auth()->id())->first();
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

        return redirect()->route('profile.show')->with('message', ['type' => 'success', 'description' => __('Profile edited successfully')]);
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
