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

        if ( $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){

            if(!$student->previous_school && !$student->certificate_document){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'danger', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if ($student->grade_id == Grade::THIRD_MIDDLE_SCHOOL || $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
            if(!$student->payment_document){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'danger', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if ($student->grade->level->id == Level::BACHELOR){
            if(!$student->payment_document || !$student->academic_history){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'danger', 'description' => __('Complete all the necessary documentation')]);
            }
        }

        if ($student->grade->level->id == Level::EDUCATIONAL_CYCLE){
            if(!$student->payment_document){
                return redirect()->route('user.profile.edit')->with('message', ['type' => 'danger', 'description' => __('Complete all the necessary documentation')]);
            }
        }
        if (!$student->dni_document || !$student->country_id || !$student->paternal_surname ||
            !$student->birth || !$student->address || !$student->address_number || !$student->postal_code
        ) {

            return redirect()->route('user.profile.edit')->with('message', ['type' => 'danger', 'description' => __('Complete all the necessary documentation')]);
        }
        return $next($request);
    }
}
