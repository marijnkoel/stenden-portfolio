<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OnlyAdmin
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
        return Auth::user()->user_level < 2 ? $next($request) : redirect('/');
    }
}
