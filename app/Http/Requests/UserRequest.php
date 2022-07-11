<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST': {
                $email = User::onlyTrashed()->where('email',$this->email)->first();
                if($email){
                    return [
                        'name' => ['required', 'string', 'max:255'],
                        'email_unique' => ['required', 'string', 'email', 'max:255'],
                        'password' => $this->passwordRules(),
                        'role' => ['nullable', 'exists:roles,name'],
                        'dni' => ['nullable', 'unique:students,dni'],
                        'grade_id' => ['required_with:level_id']
                    ];
                }
                else
                {
                    return [
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => $this->passwordRules(),
                        'role' => ['nullable', 'exists:roles,name'],
                        'dni' => ['nullable', 'unique:students,dni'],
                        'grade_id' => ['required_with:level_id']
                    ];
                }
            }
            case 'PUT': {
                $user = $this->route('user');
                if($user->hasRole('student')){
                    return [
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255'],
                        'password' => ['sometimes', 'string', 'nullable', 'confirmed', new Password()],
                        'dni' => 'required|min:9|max:9|unique:students,dni,'. $user->student->id .',id',
                        'grade_id' => ['required']
                    ];
                }
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['sometimes', 'string', 'nullable', 'confirmed', new Password()],
                    'role' => ['nullable', 'exists:roles,name'],
                    'dni' => ['nullable', 'unique:students,dni'],
                    'grade_id' => ['required_with:level_id']
                ];
            }
        }
    }
}
