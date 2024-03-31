<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";

ejecuta(function () {
    $lista = consultarEmpresa();
    $empresas = array();
    foreach ($lista as $it) {
        $id = htmlentities($it->id);
        $nombre = htmlentities($it->nombre);
        $direccion = htmlentities($it->direccion);
        $telefono = htmlentities($it->telefono);
        $calificacion = htmlentities($it->calificacion);
        $empresa = array(
            "id" => $id,
            "nombre" => $nombre,
            "direccion" => $direccion,
            "telefono" => $telefono,
            "calificacion" => $calificacion
        );
        $empresas[] = $empresa;
    }
    return json_encode($empresas);
});
