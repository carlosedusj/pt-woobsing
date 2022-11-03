<?php

namespace Database\Factories\ER\Usuario;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ER\Role\Role;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ER\Usuario\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'    => fake()->name(),
            'apellido'  => fake()->lastName(),
            'correo'    => fake()->unique()->safeEmail(),
            'telefono'  => fake()->phoneNumber(),
            'role_id'   => fake()->numberBetween(1,Role::count())
        ];
    }
}
