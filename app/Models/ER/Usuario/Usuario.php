<?php

namespace App\Models\ER\Usuario;

use App\Models\ER\Role\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    /**
     * user belongsTo role relationship
     * @return \App\Models\ER\Role\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
