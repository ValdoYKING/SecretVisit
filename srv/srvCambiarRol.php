<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/modelo/Usuario.php";
require_once __DIR__ . "/dao/usuarioBuscaCue.php";
require_once __DIR__ . "/dao/cambiarRolUsu.php"; // Nuevo archivo que contendrá la lógica para cambiar el rol de usuario

ejecuta(function () {
    session_start();

    // Obtener datos del formulario
    $usu_id = leeTexto("idUsus");
    $nuevo_rol = leeTexto("nuevo_rol");

    $usuario = new Usuario();
    $usuario->id = $usu_id;
    $usuario->roles = $nuevo_rol;

    // Realizar la actualización del rol del usuario
    cambiarRolUsu($usuario);

    return [
        "usu_id" => $usu_id,
        "nuevo_rol" => $nuevo_rol
    ];
});

?>
