<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use session;

// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Session;

class Admin
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
        if($request->session()->get("type") == "admin")
        {
            return $next($request);
        }
        elseif($request->session()->get("type") == "user")
        {
            return redirect()->route("user_dashboard");
        }
        else
        {
            return redirect()->route("main");
        }

        // if($request->user()->role == "admin")
        //     return $next($request);
        // else
        //     return redirect()->route("main");
    }
}