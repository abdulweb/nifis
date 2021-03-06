<?php

namespace Modules\Profile\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasProfileMiddleware
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
        if(!Auth()->User()->profile){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
