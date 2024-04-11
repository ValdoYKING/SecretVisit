<?php
require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/../lib/php/leeEntero.php";
require_once __DIR__ . "/modelo/Empresa.php";
require_once __DIR__ . "/dao/actualiarEmpresa.php";

ejecuta(function () {

    $id = trim(leeEntero("idemp"));
    $nombre = trim(leeTexto("nombre"));
    $direccion = trim(leeTexto("direccion"));
    $telefono = trim(leeTexto("telefono"));

    actualizarEmpresa($id,$nombre,$direccion,$telefono);

    // Agrega el usuario a la base de datos

    return [
        
        "nombre" => $nombre,
        "direccion" => $direccion,
        "telefono" => $telefono
    
    ];
});