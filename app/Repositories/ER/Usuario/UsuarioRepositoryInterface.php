<?php

namespace App\Repositories\ER\Usuario;

interface UsuarioRepositoryInterface {
    public function getAll();
    public function usuarioRole();
    public function usuariosRolesPermiso();
}