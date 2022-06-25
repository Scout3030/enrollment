<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\StudentImportRequest;
use App\Http\Requests\StudentProfileRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Grade;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Mail\NotificationResetPassword;
use Log;
use Mail;
use Str;
use Storage;

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

    public function downloadFormat(){
        return Storage::download('files/import-students-format.xlsx');
    }

    /**
     * @param StudentImportRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(StudentImportRequest $request){
        Excel::import(new UsersImport, $request->file('file'));
        return back()->with('message', ['type' => 'success', 'description' => __('Students imported successfully')]);
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
     * @param StudentProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile(StudentProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        $student = $user->student;
        $student->parents_condition = $request->parents_condition;
        $student->country_id = $request->country_id;
        $student->middle_name = $request->middle_name;
        $student->paternal_surname = $request->paternal_surname;
        $student->maternal_surname = $request->maternal_surname;
        $student->previous_school = $request->previous_school;
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
        if($student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            $student->dni_document =  $request->dni_document;
            $student->agreement_document =  $request->agreement_document;
            $student->certificate_document =  $request->certificate_document;
            $student->payment_document = $request->payment_document;
        }
        if($student->grade_id == Grade::SECOND_MIDDLE_SCHOOL) {
            $student->dni_document =  $request->dni_document;
            $student->agreement_document =  $request->agreement_document;
            $student->certificate_document =  $request->certificate_document;
        }
        if($student->grade_id == Grade::FIRST_MIDDLE_SCHOOL) {
            $student->dni_document = $request->dni_document;
            $student->agreement_document = $request->agreement_document;
        }
        $student->save();

        return redirect()->route('enrollment.create')->with('message', ['type' => 'success', 'description' => __('Documents saved successfully')]);
    }

    /**
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return back()->with('message', ['type' => 'success', 'description' => __('Student deleted successfully')]);
        } catch (\Exception $e) {
            return back()->withErrors(__('Can not delete this student'));
        }
    }

    public function export(Student $student){
        $pdf = \PDF::loadView('template_pdf.student', ['student' => $student]);
        $pdfName = Str::slug($student->user->name.' '.$student->paternal_surname.' '.$student->maternal_surname,'-');
        return $pdf->download($pdfName.'.pdf');
    }

    public function notificationResetPassword()
    {
        $students = Student::with('user')
            ->whereHas('user', function ($query) {
                $query->whereNull('last_login_at');
            })->get();

        foreach ( $students as $student ) {

            $student->user->update([
                'remember_token' => Str::random(24)
            ]);

            try {
                Mail::to( $student->user->email )->send( new NotificationResetPassword($student->user->remember_token, $student->user->email) );
            } catch (\Exception $e) {
                Log::info( __('There was an error sending the mail:') . ' ' . $e->getMessage());
            }
        }

        return back()->with('message', ['type' => 'success', 'description' => __('Emails sent successfully')]);
    }
}
