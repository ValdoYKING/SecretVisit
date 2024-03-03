<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/dao/usuarioAgrega.php";

ejecuta(function () {
    session_start();

    $cue = trim(leeTexto("cue"));
    $match = leeTexto("match");
    $rol = $_POST["rol"]; // Obtener el rol seleccionado del formulario

    // Aquí puedes realizar cualquier validación adicional que necesites, como verificar si el usuario ya existe, si las contraseñas coinciden, etc.

    // Crear un nuevo usuario con los datos proporcionados
    $usuario = new Usuario($cue, $match, [$rol]);

    // Agregar el usuario a la base de datos
    usuarioAgrega($usuario);

    // Establecer las variables de sesión con los datos del usuario registrado
    $_SESSION[CUE] = $cue;
    $_SESSION[ROL_IDS] = [$rol];

    // Retornar los datos del usuario registrado
    return [
        CUE => $cue,
        ROL_IDS => [$rol]
    ];
});
