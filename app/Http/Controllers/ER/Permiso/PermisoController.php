<?php

namespace App\Http\Controllers\ER\Permiso;

use App\Http\Controllers\Controller;
use App\Repositories\ER\Permiso\PermisoRepositoryInterface;

/**
 * @property \App\Repositories\ER\Permiso\PermisoRepositoryInterface $permisoRepository
 */
class PermisoController extends Controller
{
    public function __construct(protected PermisoRepositoryInterface $permisoRepository)
    {
        
    }

    /**
     * obtener todos los permisos
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function index()
    {
        return response()->json([
            'SUCCESS' => true,
            'code'    => 200,
            'data'    => [
                'permisos' => $this->permisoRepository->getAll()
            ]
        ]);
    }

    /**
     * obtener permisos del role 1
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function permisosRole()
    {
        $permisos = $this->permisoRepository->permisosRole();
        return view('R1.permisosRole',compact('permisos'));
    }

}
