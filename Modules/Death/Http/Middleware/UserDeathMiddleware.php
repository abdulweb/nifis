<?php

namespace Modules\Death\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserDeathMiddleware
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
        if(Auth()->User()->life_status_id == 0){
            session()->flush();
            return redirect()->route('user.dead');
        }
        return $next($request);
    }
}
