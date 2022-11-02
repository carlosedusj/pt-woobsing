<?php

namespace App\Models\ER\Permiso;

use App\Models\ER\Role\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permisos';

    /**
     * roles relationship
     * @return \App\Models\ER\Role\Role
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permiso_role')->withTimestamps();
    }

}
