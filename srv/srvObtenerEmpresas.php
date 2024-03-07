<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultaEmpresas.php";

// Utiliza la función ejecuta para manejar la lógica del servicio
ejecuta(function () {
    try {
        // Llama a la función que obtiene las empresas y devuelve su resultado
        $empresas = obtenerEmpresas();

        // Devuelve las empresas como respuesta JSON
        return $empresas;
    } catch (Exception $e) {
        // Si hay un error, devuelve un mensaje de error
        return ['error' => 'Error al obtener las empresas: ' . $e->getMessage()];
    }
});
