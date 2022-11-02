<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class OneDayLogged
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
         * cerrar la sesion al cumplir 1 dia logueado
         */
        if($this->calculateSeconds() > 86400){
            auth()->logout();   
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }

        return $next($request);
    }

    public function calculateSeconds(){
        return $this->timeNow()->getTimestamp() - $this->userLastLogin()->getTimestamp();
    }

    public function timeNow()
    {
        return new \DateTime();
    }

    public function userLastLogin()
    {
        return new \DateTime(auth()->user()->last_login);
    }
}
