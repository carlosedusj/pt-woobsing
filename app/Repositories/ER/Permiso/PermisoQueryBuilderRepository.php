<?php

namespace App\Repositories\ER\Permiso;

use Illuminate\Support\Facades\DB;

/**
 * @property \Illuminate\Support\Facades\DB
 */
class PermisoQueryBuilderRepository implements PermisoRepositoryInterface{

    /**
     * obtener todos los permisos
     * @return \App\Models\ER\Permiso\Permiso
     */
    public function getAll(){
        return DB::table('permisos')->get();
    }
    
    /**
     * obtener permisos del rol 1
     * @return \App\Models\ER\Permiso\Permiso
     */
    public function permisosRole()
    {
        return DB::table('permisos')
            ->join('permiso_role','permiso_role.id', '=', 'permiso_role.id')
            ->where('permiso_role.permiso_id','=',2)
            ->get();
    }
}