<?php

namespace App\Http\Controllers\R5;

use App\Http\Controllers\Controller;
use App\Models\User;

class ValidacionController extends Controller
{   
    public function __construct(protected User $user)
    {

    }
    /**
     * retorna formulario de validacion email si no esta verificado sino devuelve home
     * @return \resources\views\R5\validation.blade.php
     */
    public function index()
    {
        if(!is_null(auth()?->user()?->email_verified_at)) return redirect('/home');
        return view('R5.validacion');
    }

    /**
     * agrega un fecha de validacion a email_verified_at al usuario autenticado
     * @return \resources\views\home.blade.php
     */
    public function validar()
    {
        $this->user->findOrFail(auth()->user()->id)->update([
            'email_verified_at' => new \DateTime('now')
        ]);

        return redirect('/home');
    }
}
