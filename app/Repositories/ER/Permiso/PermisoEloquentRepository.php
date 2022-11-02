<?php

namespace App\Repositories\ER\Permiso;

use App\Models\ER\Permiso\Permiso;

/**
 * @property \App\Models\ER\Permiso\Permiso $permiso
 */
class PermisoEloquentRepository implements PermisoRepositoryInterface{
    
    public function __construct(protected Permiso $permiso)
    {
        
    }

    /**
     * obtener todos los permisos
     * @return \App\Models\ER\Permiso\Permiso
     */
    public function getAll()
    {
        return $this->permiso->all();
    }

    /**
     * obtener permisos del rol 1
     * @return \App\Models\ER\Permiso\Permiso
     */
    public function permisosRole()
    {
        return $this->permiso->with(['roles' => function($q){
            return $q->select('roles.nombre',)->where('roles.id',1);
        }])->get();
    }

}