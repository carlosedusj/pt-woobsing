<?php

namespace App\Http\Controllers\ER\Usuario;

use App\Http\Controllers\Controller;
use App\Repositories\ER\Usuario\UsuarioRepositoryInterface;

/**
 * @property \App\Repositories\ER\Usuario\UsuarioRepositoryInterface $usuarioRepository 
 */
class UsuarioController extends Controller
{
    public function __construct(protected UsuarioRepositoryInterface $usuarioRepository)
    {
        
    }
    /**
     * obtener todos los usuarios
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function index()
    {
        return response()->json([
            'SUCCESS' => true,
            'code'    => 200,
            'data'    => [
                'usuarios' => $this->usuarioRepository->getAll()
            ]
        ]);
    }

    /**
     * obtener todos los usuarios
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuariosRole()
    {
        $usuarios = $this->usuarioRepository->usuarioRole();

        return view('R1.usuariosRole',compact('usuarios'));
    }

    /**
     * obtener todos los usuarios
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuariosRolesPermiso()
    {
        $usuarios = $this->usuarioRepository->usuariosRolesPermiso();

        return view('R1.usuariosRolesPermiso',compact('usuarios'));
    }
}
