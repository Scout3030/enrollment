<?php

namespace App\Http\Requests;

use App\Models\Level;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Grade;
use Illuminate\Validation\Rule;

class StudentProfileRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $student = auth()->user()->student;

        $rules = [
            'name' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
            'middle_name' => 'required|string|min:3',
            'paternal_surname' => 'required|string|min:3',
            'maternal_surname' => 'required|string|min:3',
            'birth' => 'required|date',
            'address' => 'required|string|min:3',
            'address_number' => 'required|string',
            'door' => 'nullable|string',
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'letter' => 'nullable|string',
            'postal_code' => 'required|string',

            'first_tutor_dni' => 'required|string|min:9|max:9',
            'first_tutor_full_name' => 'required|string|min:3',
            'first_tutor_phone_number' => 'required|string|min:6',
            'first_tutor_email' => 'required|email',
            'first_tutor_address' => 'required|string|min:3',

            'second_tutor_dni' => 'nullable|string|min:9|max:9',
            'second_tutor_full_name' => 'nullable|string|min:3',
            'second_tutor_phone_number' => 'nullable|string|min:6',
            'second_tutor_email' => 'nullable|email',
            'second_tutor_address' => 'nullable|string|min:3',

            'dni_document'=>'required',
            'previous_school' => 'nullable|min:10'
        ];

        $moreRules = [];

        if($student->grade_id == Grade::SECOND_MIDDLE_SCHOOL) {
            $moreRules = [
                'parents_condition' => 'required',
                'certificate_document'=>[Rule::requiredIf(function () {
                    return $this->previous_school;
                })],
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            $moreRules = [
                'parents_condition' => 'required',
                'payment_document' => 'required',
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade->level->id == Level::BACHELOR) {
            $moreRules = [
                'parents_condition' => 'required',
                'payment_document' => 'required',
                'academic_history' => 'required',
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade->level->id == Level::EDUCATIONAL_CYCLE) {
            $moreRules = [
                'parents_condition' => 'nullable',
                'payment_document' => 'required',
            ];
        }

        return array_merge($rules, $moreRules);
    }
}
