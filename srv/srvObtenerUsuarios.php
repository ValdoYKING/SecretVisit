<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultaUsuario.php";


// Utiliza la función ejecuta para manejar la lógica del servicio
ejecuta(function () {
    // Llama a la función que obtiene los usuarios y devuelve su resultado
    $usuarios = obtenerUsuarios();
    return $usuarios;
});
