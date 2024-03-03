<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/const/ROL_ADMINISTRADOR.php";
require_once __DIR__ . "/const/ROL_MYSTERY_SHOPPER.php";
require_once __DIR__ . "/const/ROL_ANALISTA.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/modelo/Usuario.php";
require_once __DIR__ . "/dao/usuarioBuscaCue.php";
require_once __DIR__ . "/dao/usuarioAgrega.php";

ejecuta(function () {
    session_start();

    $cue = trim(leeTexto("cue"));
    $match = leeTexto("match");
    $confirmarMatch = leeTexto("confirmarMatch");
    $rol = leeTexto("rol");

    if ($match !== $confirmarMatch) {
        throw new Exception("Las contraseñas no coinciden.");
    }

    // Verifica si ya existe un usuario con el mismo CUE
    $usuarioExistente = usuarioBuscaCue($cue);

    // Si el usuario ya existe, lanza una excepción
    if ($usuarioExistente !== false) {
        throw new Exception("El usuario ya está registrado.");
    }


    /* $mysteryShopper = new Rol(
        id: ROL_MYSTERY_SHOPPER,
        descripcion: "Evalúa la calidad de la atención."
    );

    $analista = new Rol(
        id: ROL_ANALISTA,
        descripcion: "Evalua y crea encuestas"
    ); */

    $mysteryShopper = new Rol(ROL_MYSTERY_SHOPPER, "Evalúa la calidad de la atención.");
    $analista = new Rol(ROL_ANALISTA, "Evalua y crea encuestas");

    // Si el usuario no existe, crea un nuevo objeto Usuario con los datos del formulario
    $usuarioNuevo = new Usuario($cue, $match, [], 0);

    // Agrega el rol correspondiente al usuario según el valor recibido del formulario


    switch ($rol) {
        case "Mystery Shopper":
            $usuarioNuevo->roles = [$mysteryShopper];
            break;
        case "Analista":
            $usuarioNuevo->roles = [$analista];
            break;
        default:
            throw new Exception("Rol inválido.");
            break;
    }

    // Agrega el usuario a la base de datos
    usuarioAgrega($usuarioNuevo);

    return [
        "cue" => $cue,
        "rol" => $rol
    ];
});
