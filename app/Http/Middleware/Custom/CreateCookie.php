<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class CreateCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        /**
         * usuario con role 1 y localhost envia una cookie al navegador
         */
       if(auth()->user()->role_id == 1 && $request->ip() == '127.0.0.1'){
            return $next($request)->withCookie('origin_sesion');
       }
       return $next($request);
    }
}
