<?php

namespace Modules\Family\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUsedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->User()->family()){
            return redirect('/home');
        }
        return $next($request);
    }
}
