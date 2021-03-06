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
            'authorization_tokapp' => 'required',
            'authorization_electronics'=> 'required',
            'authorization_extracurricular'=> 'required',
            'authorization_data'=>'required',

            'name' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
            'paternal_surname' => 'required|string|min:3',
            'maternal_surname' => 'nullable|string|min:3',
            'birth' => 'required|date',
            'address' => 'required|string|min:3',
            'address_number' => 'required|string',
            'door' => 'nullable|string',
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'letter' => 'nullable|string',
            'postal_code' => 'required|string',

            'first_tutor_dni' => 'nullable|string|min:9|max:9',
            'first_tutor_full_name' => 'nullable|string|min:3',
            'first_tutor_phone_number' => 'nullable|string|min:6',
            'first_tutor_email' => 'nullable|email',
            'first_tutor_address' => 'nullable|string|min:3',

            'second_tutor_dni' => 'nullable|string|min:9|max:9',
            'second_tutor_full_name' => 'nullable|string|min:3',
            'second_tutor_phone_number' => 'nullable|string|min:6',
            'second_tutor_email' => 'nullable|email',
            'second_tutor_address' => 'nullable|string|min:3',

            'dni_document'=>'required',
            'previous_school' => 'nullable|string'
        ];

        $phoneRules = [];
        $moreRules = [];
        $documentRules = [];

        if($this->authorization_tokapp == 1){
            $phoneRules = [
                'authorization_phone'=> 'required',
            ];
        }

        if($student->grade_id == Grade::FIRST_MIDDLE_SCHOOL) {
            $moreRules = [
                'parents_condition' => 'nullable',
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade_id == Grade::SECOND_MIDDLE_SCHOOL) {
            $moreRules = [
                'parents_condition' => 'nullable',
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL) {
            $moreRules = [
                'parents_condition' => 'nullable',
                'payment_document' => 'required',
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade_id == Grade::SECOND_HIGH_SCHOOL || $student->grade_id == Grade::THIRD_HIGH_SCHOOL) {
            $moreRules = [
                'parents_condition' => 'nullable',
                'payment_document' => 'required',
                'agreement_document'=>[Rule::requiredIf(function () {
                    return $this->parents_condition == \App\Models\Student::SEPARATED;
                })],
            ];
        }

        if($student->grade->level->id == Level::BACHELOR) {
            $moreRules = [
                'parents_condition' => 'nullable',
                'payment_document' => 'required',
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

        return array_merge($rules, $moreRules, $phoneRules, $documentRules);
    }
}
