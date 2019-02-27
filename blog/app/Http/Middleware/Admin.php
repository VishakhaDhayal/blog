<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Session;

class Admin
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
        if(Auth::user()->admin)
            return $next($request);
        else
        {
            Session::flash('success','You dont have permisions to perform this action');
            return redirect()->route('home');
        }
    }
}
