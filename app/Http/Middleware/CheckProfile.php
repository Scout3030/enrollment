<?php

namespace App\Http\Middleware;

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
        $profile = Student::where('user_id',auth()->user()->id)->first();
        $student = auth()->user()->student;

        if ( $student->grade_id == Grade::FIRST_MIDDLE_SCHOOL ||  $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL ||
          $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||  $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
            if($profile->parents_condition == 0 && !$profile->agreement_document){
               return redirect()->route('user.profile.edit');
            }
        }

        if ( $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
          $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
           
            if(!$profile->previous_school && !$profile->certificate_document){
               return redirect()->route('user.profile.edit');
            }
        }

        if ($student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
            if(!$profile->payment_document){
                return redirect()->route('user.profile.edit');   
            }          
        }
       
        if (!$profile->dni_document || !$profile->country_id || !$profile->paternal_surname || !$profile->middle_name ||
            !$profile->maternal_surname || !$profile->birth || !$profile->address || !$profile->address_number ||
            !$profile->door || !$profile->stair || !$profile->first_tutor_dni || !$profile->floor || !$profile->letter || 
            !$profile->postal_code || !$profile->first_tutor_full_name || !$profile->first_tutor_email || 
            !$profile->first_tutor_phone_number || !$profile->first_tutor_full_name || !$profile->first_tutor_email ||
            !$profile->first_tutor_address || !$profile->second_tutor_dni || !$profile->second_tutor_full_name ||
            !$profile->second_tutor_phone_number || !$profile->second_tutor_email || !$profile->second_tutor_address ) {
       
            return redirect()->route('user.profile.edit');
        }
        return $next($request);
    }
}
