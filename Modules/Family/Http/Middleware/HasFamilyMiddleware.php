<?php

namespace Modules\Family\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasFamilyMiddleware
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
        if(Auth()->User()->profile()){
            session()->flash('error',['Sorry you either register your family or been registered as a member of other family in that case you can not create family account rather you register your marriage which can automatically create family for you under your registered family.']);
            return redirect('/home');
        }
        return $next($request);
    }
}
