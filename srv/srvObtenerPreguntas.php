<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultaPreguntas.php";

// Utiliza la función ejecuta para manejar la lógica del servicio
ejecuta(function () {
    // Llama a la función que obtiene las preguntas y devuelve su resultado
    $preguntas = obtenerPreguntas();
    return $preguntas;
});

?>
