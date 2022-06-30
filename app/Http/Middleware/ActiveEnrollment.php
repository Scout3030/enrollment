<?php

namespace App\Http\Middleware;

use App\Models\AcademicPeriod;
use Closure;
use Illuminate\Http\Request;

class ActiveEnrollment
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
        $lastProcess = AcademicPeriod::whereLevelId($student->grade->level_id)
            ->latest('id')
            ->first();

        $now = now();

        if(!$lastProcess) {
            return redirect()->route('dashboard.index')
                ->with('message', ['type' => 'warning', 'description' => __('There is not an active process for this level at the moment')]);
        }

        if ( !($lastProcess->started_at<= $now && $now <= $lastProcess->finished_at) ) {
            return redirect()->route('dashboard.index')
                ->with('message', ['type' => 'warning', 'description' => __('There is not an active process for this level at the moment')]);
        }

        if ( !$lastProcess->status ) {
            return redirect()->route('dashboard.index')
                ->with('message', ['type' => 'warning', 'description' => __('There is not an active process for this level at the moment')]);
        }

        return $next($request);
    }
}
