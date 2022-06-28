<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasGradeMiddleware
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
        $user = auth()->user();
        if($user->hasRole('student') && !$user->student->grade_id) {
            return redirect()->route('user.grade')->with('message', ['type' => 'success', 'description' => __('Select an option')]);
        }

        return $next($request);
    }
}
