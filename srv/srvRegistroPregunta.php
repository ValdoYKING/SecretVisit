<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/modelo/Preguntas.php";
require_once __DIR__ . "/dao/agregarPregunta.php";

ejecuta(function () {

    $pre = trim(leeTexto("apregunta"));

    // crea un nuevo objeto Usuario con los datos del formulario
    $pregunNuevo = new Preguntas($pre, 0);



    // Agrega el usuario a la base de datos
    agregarPregunta($pregunNuevo);

    return [
        "apregunta" => $pre
    ];
});
