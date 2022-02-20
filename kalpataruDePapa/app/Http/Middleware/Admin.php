<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        //Verificar si el usuario que está intentando acceder al recurso es administrador
        if(Auth::check() && Auth::user()->role->name=='admin'){
            //Puede pasar
            return $next($request);
        }else{
            \Session::flash('tipoMensaje','info');
            \Session::flash('mensaje','No tiene suficientes privilegios para acceder a este recurso.');
            return \Redirect::back();
        }
    }
}
