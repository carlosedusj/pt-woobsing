<?php

namespace App\Repositories\ER\Usuario;

use App\Models\ER\Usuario\Usuario;

/**
 * @property \App\Models\ER\Usuario\Usuario $usuario
 */
class UsuarioEloquentRepository implements UsuarioRepositoryInterface{
    
    public function __construct(protected Usuario $usuario)
    {
        
    }

    /**
     * obtener todos los usuarios
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function getAll(){
        return $this->usuario->all();
    }

    /**
     * obtener usuario por role id 1 y 2
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuarioRole()
    {
        return $this->usuario->with('role')->whereIn('role_id',[1,2])->get();
    }

    /**
     * obtener usuario y roles con permiso 2
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuariosRolesPermiso()
    { 
        return $this->usuario->with('role')->whereHas('role.roleWithSecondPermission')->get();
    }
}