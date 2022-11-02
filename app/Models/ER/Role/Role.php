<?php

namespace App\Models\ER\Role;

use App\Models\ER\Permiso\Permiso;
use App\Models\ER\Usuario\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $hidden = ['pivot'];

    /**
     * usuarios relationship
     * @return \App\Models\ER\Usuario\Usuario
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    /**
     * permisos relationship
     * @return \App\Models\ER\Permiso\Permiso
     */
    public function permisos()
    {
        return $this->belongsToMany(Permiso::class,'permiso_role')->withTimestamps();
    }

    /**
     * permisos relationship con permiso_id igual a 2
     * @return \App\Models\Er\Permiso\Permiso
     */
    public function roleWithSecondPermission()
    {
        return $this->belongsToMany(Permiso::class,'permiso_role')->where('permiso_id',2);
    }
}
