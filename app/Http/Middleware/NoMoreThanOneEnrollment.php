<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NoMoreThanOneEnrollment
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
        if ( $student->enrollments->count() > 0 ) {
            return redirect()->route('dashboard.index')->with('process');
        }
        return $next($request);
    }
}
