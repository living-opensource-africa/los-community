<?php

namespace App\Http\Middleware;

use Closure;

class isActive
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
        if (Auth::user()->active !== 1) {
            return redirect()->back()->with('error', 'Sorry, this account is inactive');
        }
        return $next($request);
    }
}
