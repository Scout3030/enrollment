<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $student = $this->route('student');
        return [
            'name' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
            'email' => 'required|email|unique:users,email,'. $student->user->id .',id',
            'dni' => 'required|min:8|max:8|unique:students,dni,'. $student->id .',id',
            'middle_name' => 'nullable|string|min:3',
            'paternal_surname' => 'nullable|string|min:3',
            'maternal_surname' => 'nullable|string|min:3',
            'birth' => 'nullable|date',
            'address' => 'nullable|string|min:3',
            'address_number' => 'nullable|string',
            'door' => 'nullable|string',
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'letter' => 'nullable|string',
            'postal_code' => 'nullable|string',

            'first_tutor_dni' => 'nullable|string|min:8|max:8',
            'first_tutor_full_name' => 'nullable|string|min:3',
            'first_tutor_phone_number' => 'nullable|string|min:6',
            'first_tutor_email' => 'nullable|email',
            'first_tutor_address' => 'nullable|string|min:3',

            'second_tutor_dni' => 'nullable|string|min:8|max:8',
            'second_tutor_full_name' => 'nullable|string|min:3',
            'second_tutor_phone_number' => 'nullable|string|min:6',
            'second_tutor_email' => 'nullable|email',
            'second_tutor_address' => 'nullable|string|min:3',
        ];
    }
}
