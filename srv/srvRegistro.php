<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/modelo/Usuario.php";
require_once __DIR__ . "/dao/usuarioAgrega.php";

ejecuta(function () {
    // Inicia sesión para mantener los datos de sesión
    session_start();

    // Lee los datos del formulario
    $cue = trim(leeTexto("cue"));
    $match = leeTexto("match");
    $confirmarMatch = leeTexto("confirmarMatch");
    $rol = leeTexto("rol"); // Este es un valor de texto, puedes ajustarlo según tu implementación

    // Verifica que las contraseñas coincidan
    if ($match !== $confirmarMatch) {
        throw new Exception("Las contraseñas no coinciden.");
    }

    // Crea un nuevo objeto Usuario con los datos del formulario
    $usuario = new Usuario($cue, $match, [], 0);

    // Agrega el rol al usuario (puedes ajustar esta parte según la estructura de tu sistema)
    // Aquí se está asumiendo que el rol se pasa como un texto y se crea un objeto Rol con ese texto
    $roles = [new Rol($rol)]; 

    // Asigna los roles al usuario
    $usuario->roles = $roles;

    // Agrega el usuario a la base de datos
    usuarioAgrega($usuario);

    // Retorna los datos del usuario registrado (en caso de que los necesites)
    return [
        "cue" => $cue,
        "rol" => $rol
    ];
});
