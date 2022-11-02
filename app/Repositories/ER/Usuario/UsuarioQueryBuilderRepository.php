<?php

namespace App\Repositories\ER\Usuario;

use Illuminate\Support\Facades\DB;

/**
 * @property \Illuminate\Support\Facades\DB
 */
class UsuarioQueryBuilderRepository implements UsuarioRepositoryInterface{


    /**
     * obtener todos los usuarios
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function getAll(){
        return DB::table('usuarios')->get();
    }

    /**
     * obtener usuario por role id 1 y 2
     * @return \App\Models\ER\Usuario\Usuario
     */    
    public function usuarioRole()
    {
        return DB::table('usuarios')->whereIn('role_id',[1,2])->get();
    }

    /**
     * obtener usuario y roles con permiso 2
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuariosRolesPermiso()
    { 
        return DB::table('usuarios')
            ->select('usuarios.nombre','usuarios.apellido','usuarios.correo','roles.nombre AS role')
            ->join('roles','usuarios.role_id','=','roles.id')
            ->join('permiso_role','roles.id','=','permiso_role.role_id')
            ->where('permiso_role.permiso_id', '=', 2)
            ->get();
    }
}