<?php

namespace App\Http\Middleware;

use Closure;

class MeetAppAuth
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
        $token = $request->header('MeetAppKey');
        if ($token == NULL) {
          return response()->json([
            'message' => 'No token provided',
            'status' => 'error'
          ], 401);
        }
        else if ($token !== env('MEETAPP_KEY')) {
          return response()->json([
            'message' => 'Incorrect key provided',
            'status' => 'error'
          ], 401);
        }
        return $next($request);
    }
}
