<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ER\Permiso\PermisoController;
use App\Http\Controllers\ER\Usuario\UsuarioController;
use App\Http\Controllers\R4\SolucionController;
use App\Http\Controllers\R5\ValidacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

/**
 * respuestas practicas de pregunta 1
 */
Route::group(['prefix' => 'R1' ],function(){
    /**
     * obtener todos los usuarios
    */
    Route::get('usuarios',[UsuarioController::class, 'index']);

    /**
     * usuarios que tengan rol 1 y 2
     * Sql :
     * SELECT * FROM usuarios WHERE role_id IN (1,2);
     */
    Route::get('usuarios/role/',[UsuarioController::class, 'usuariosRole']);

    /**
     * permisos del rol 1
     * Slq :
     * SELECT * FROM permisos p 
     * INNER JOIN permiso_role pr ON p.id = pr.permiso_id 
     * WHERE pr.role_id = 1;
     */
    Route::get('permisos/roles/',[PermisoController::class,'permisosRole']);

    /**
     * usuarios y role con permiso 2
     * Slq :
     * SELECT DISTINC u.id,u.nombre,u.apellido,u.correo,r.nombre as role 
     * FROM usuarios u 
     * INNER JOIN roles r on u.role_id = r.id 
     * INNER JOIN permiso_role pr on r.id = pr.role_id 
     * AND pr.permiso_id = 2;
     */
    Route::get('usuarios/roles/permisos/',[UsuarioController::class, 'usuariosRolesPermiso']);
});

/**
 * repuesta practica pregunta 4
 */
Route::group(['prefix' => 'R4'], function (){
    Route::get('solucion', SolucionController::class);
});

/**
 * respuestas practicas pregunta 5
 */
Route::group([
    'prefix'     => 'R5',
    'middleware' => 'auth'
],function(){
    Route::get('/validacion',[ValidacionController::class, 'index'])->name('validacion');
    Route::post('/validar',[ValidacionController::class, 'validar'])->name('validar');
});


/**
 * rutas por defecto, auth laravel scaffolding
 */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Route::fallback();