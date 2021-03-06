<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->user_type !== 1 ||
            Auth::user()->user_type !== 2 ||
            Auth::user()->user_type !== 3) {
                return redirect()->back()->with('error', 'Permission Denied');
            }
        return $next($request);
    }
}
