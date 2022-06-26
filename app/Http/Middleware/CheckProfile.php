<?php

namespace App\Http\Middleware;

use App\Models\Level;
use App\Models\Student;
use App\Models\Grade;
use Closure;
use Illuminate\Http\Request;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $student = auth()->user()->student;

        if ( $student->grade_id == Grade::FIRST_MIDDLE_SCHOOL ||  $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||  $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
            if($student->parents_condition == 0 && !$student->agreement_document){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'success', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if ( $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){

            if(!$student->previous_school && !$student->certificate_document){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'success', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if ($student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
            if(!$student->payment_document){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'success', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if ($student->grade->level->id == Level::BACHELOR){
            if(!$student->payment_document || !$student->academic_history){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'success', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if (!$student->dni_document || !$student->country_id || !$student->paternal_surname || !$student->middle_name ||
            !$student->maternal_surname || !$student->birth || !$student->address || !$student->address_number ||
            !$student->first_tutor_dni ||
            !$student->postal_code || !$student->first_tutor_full_name || !$student->first_tutor_email ||
            !$student->first_tutor_phone_number || !$student->first_tutor_full_name || !$student->first_tutor_email ||
            !$student->first_tutor_address
        ) {

            return redirect()->route('user.profile.edit')->with('message', ['type' => 'success', 'description' => __('Complete all the necessary documentation')]);
        }
        return $next($request);
    }
}
