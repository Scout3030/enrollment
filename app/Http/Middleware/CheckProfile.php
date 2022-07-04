<?php

namespace App\Http\Middleware;

use App\Models\Level;
use App\Models\Student;
use App\Models\Grade;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

        if ($student->grade_id == Grade::SECOND_HIGH_SCHOOL || $student->grade_id == Grade::FIRST_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::THIRD_HIGH_SCHOOL || $student->grade_id == Grade::SECOND_MIDDLE_SCHOOL ||
            $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||  $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL){
            if($student->parents_condition == Student::SEPARATED && !$student->agreement_document){
                return redirect()->route('user.profile.edit')
                    ->withErrors([__('Adjunte el convenio de custodia de menores')]);
            }
        }

        if ( $student->grade_id == Grade::SECOND_HIGH_SCHOOL || $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL ||
             $student->grade_id == Grade::FOURTH_MIDDLE_SCHOOL || $student->grade_id == Grade::THIRD_HIGH_SCHOOL){
            if(!$student->payment_document){
                return redirect()->route('user.profile.edit')
                    ->withErrors([__('Es necesario adjuntar el certificado de pago')]);
            }
        }

        if ($student->grade->level->id == Level::BACHELOR){
            if(!$student->payment_document){
                return redirect()->route('user.profile.edit')
                    ->withErrors([__('Adjunte el certificado de pago')]);
            }
        }

        if ($student->grade->level->id == Level::EDUCATIONAL_CYCLE){
            if(!$student->payment_document){
                return redirect()->route('user.profile.edit')
                    ->withErrors([__('Es necesario adjuntar el certificado de pago')]);
            }
        }

        if (!$student->dni_document) {
            return redirect()->route('user.profile.edit')
                ->withErrors([__('Adjunte el documento DNI')]);
        }

        if (!$student->country_id || !$student->paternal_surname ||
            !$student->birth || !$student->address || !$student->address_number || !$student->postal_code
        ) {
            return redirect()->route('user.profile.edit')
                ->withErrors([__('Complete la infomación del alumno')]);
        }
        return $next($request);
    }
}
