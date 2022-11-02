<?php

namespace App\Http\Controllers\R4;

use App\Http\Controllers\Controller;

class SolucionController extends Controller
{

    public function __invoke()
    {
        $usuarios = [
            ['nombre' => 'Carlos',  'apellido'  => 'Sanchez',   'telefono'  => '12312312312'],
            ['nombre' => 'Daniela', 'apellido'  => 'Perez',     'telefono'  => '12312312312'],
            ['nombre' => 'Luis',    'apellido'  => 'Garcia',    'telefono'  => '12312312312'],
            ['nombre' => 'Pedro',   'apellido'  => 'Rivero',    'telefono'  => '12312312312'],
            ['nombre' => 'Andres',  'apellido'  => 'Rojas',     'telefono'  => '12312312312'],
        ];

        
        foreach ($usuarios as $usuario) {
            /**antiguo codigo con error
             *   echo $usuario['nombre'] + ' ' + $usuario['apellido'] + ' ' +$usuario['telefono'];           
             */

            /**solucion: la concatenacion en php es con . no con + */
            echo $usuario['nombre'] . ' ' . $usuario['apellido'] . ' ' .$usuario['telefono'].'<br>';           
        }
    }
}
