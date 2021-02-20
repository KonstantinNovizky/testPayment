<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
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
        if($request->session()->get("type") == "user")
        {
            return $next($request);
        }
        elseif($request->session()->get("type") == "admin")
        {
            return redirect()->route("admin");
        }
        else
        {
            return redirect()->route("main");
        }
    }
}