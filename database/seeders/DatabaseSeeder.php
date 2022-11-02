<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\ER\PermisoRole\PermisoRoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        /**
         * crea roles y permisos
         */
        $this->call(PermisoRoleSeeder::class);

        /**
         * crea 10 usuarios fake
         */
        \App\Models\ER\Usuario\Usuario::factory(10)->create();
    }
}
