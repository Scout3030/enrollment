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
        $lastProcess = AcademicPeriod::latest('id')->first();
        $now = now();

        if ( ! auth()->user()->student->hasActiveProcess() ) {
            return redirect()->route('dashboard.index')->with('process');
        }

        if ( !($lastProcess->started_at<= $now && $now <= $lastProcess->finished_at) ) {
            return redirect()->route('dashboard.index')->with('process');
        }

        if ( !$lastProcess->status ) {
            return redirect()->route('dashboard.index')->with('process');
        }

        return $next($request);
    }
}
