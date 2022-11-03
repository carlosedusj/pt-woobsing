<?php

namespace Database\Seeders\ER\PermisoRole;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ER\Role\Role;
use App\Models\ER\Permiso\Permiso;

/**
 * @property \App\Models\ER\Permiso\Permiso $permiso
 * @property \App\Models\ER\Role\Role $role
 */
class PermisoRoleSeeder extends Seeder
{
    protected $roles = [
        'Admin',
        'Supervisor',
        'Extra'
    ];

    protected $permisions = [
        'index-usuario',
        'show-usuario',
        'create-usuario',
        'update-usuario',
        'delete-usuario',
    ];

    public function __construct(protected Role $role, protected Permiso $permiso)
    {

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * crea 3 roles
         */
        foreach ($this->roles as $role) {
            $this->role->create([
                'nombre' => $role,
            ]);
        }

        /**
         * crea 5 permisos
         */
        foreach ($this->permisions as $permision) {
            $this->permiso->create([
                'permiso' => $permision,
            ]);
        }

        /**
         * agrega al role admin, todos los permisos
         */
        $this->role->find(1)->permisos()->attach([1,2,3,4,5]);

        /**
         * agrega al role supervisor, solo index-usuario
         */
        $this->role->find(2)->permisos()->attach(1);
    }
}
