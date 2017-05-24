<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Authenticate
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
        if($request->session()->has('id'))
        {
            if($request->session()->get('name') == "")
                return Redirect::to('/newuser');
            return $next($request);
        }
        else
        {
            return Redirect::to('/login');
        }
    }
}
