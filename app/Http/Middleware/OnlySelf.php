<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OnlySelf
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
        if (Auth::user()->user_level < 2) {
            return $next($request);
        }

        if (isset($request->user)) {
            return $request->user == Auth::user()->id ? $next($request) : redirect('/'); 
        }

        if (isset($request->portfolio)) {
            return $request->portfolio == Auth::user()->portfolio_id ? $next($request) : redirect('/'); 
        }
    }
}
