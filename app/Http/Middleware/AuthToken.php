<?php

namespace App\Http\Middleware;

use Closure;

class AuthToken
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
        $token=$request->header('APP_TOKEN');
        if($token!=env('PUSHER_APP_KEY'))
        {
           return response()->json(['message'=>'App token not found'],401);
        }
        return $next($request);
    }
}
