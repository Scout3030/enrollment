<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
            'dni' => 'required|min:8|max:8|unique:students,dni,'. auth()->id() .',user_id',
            'middle_name' => 'required|string|min:3',
            'paternal_surname' => 'required|string|min:3',
            'maternal_surname' => 'required|string|min:3',
            'birth' => 'required|date',
            'address' => 'required|string|min:3',
            'address_number' => 'required|string',
            'door' => 'required|string',
            'stair' => 'required|string',
            'floor' => 'required|string',
            'letter' => 'required|string',
            'postal_code' => 'required|string',

            'first_tutor_dni' => 'required|string|min:8|max:8',
            'first_tutor_full_name' => 'required|string|min:3',
            'first_tutor_phone_number' => 'required|string|min:6',
            'first_tutor_email' => 'required|email',
            'first_tutor_address' => 'required|string|min:3',

            'second_tutor_dni' => 'required|string|min:8|max:8',
            'second_tutor_full_name' => 'required|string|min:3',
            'second_tutor_phone_number' => 'required|string|min:6',
            'second_tutor_email' => 'required|email',
            'second_tutor_address' => 'required|string|min:3',

            'parents_condition' => 'required'
        ];
    }
}
