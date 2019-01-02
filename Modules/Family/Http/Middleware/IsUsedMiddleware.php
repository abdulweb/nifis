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
            session()->flash('error',['Sorry you sorry you have register a family account with this you cannot register another one it due to some security reason for more reason contact us at nifis@nifis.net']);
            return redirect('/home');
        }
        return $next($request);
    }
}
