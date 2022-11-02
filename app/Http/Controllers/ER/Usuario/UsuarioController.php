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
        return response()->json([
            'SUCCESS' => true,
            'code'    => 200,
            'data'    => [
                'usuarios con rol 1 y 2' => $this->usuarioRepository->usuarioRole()
            ]
        ]);
    }

    /**
     * obtener todos los usuarios
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuariosRolesPermiso()
    {
        return response()->json([
            'SUCCESS' => true,
            'code'    => 200,
            'data'    => [
                'usuarios y roles con permiso 2' => $this->usuarioRepository->usuariosRolesPermiso()
            ]
        ]);
    }
}
