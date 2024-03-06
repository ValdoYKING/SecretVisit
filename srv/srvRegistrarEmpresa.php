<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/modelo/Empresa.php";
require_once __DIR__ . "/dao/EmpresaAgregar.php";

ejecuta(function () {

    $nombre = trim(leeTexto("nombre"));
    $direccion = trim(leeTexto("direccion"));
    $telefono = trim(leeTexto("telefono"));

    // crea un nuevo objeto Usuario con los datos del formulario
    $nuevaEmpresa = new Empresa(0,$nombre,$direccion,$telefono);



    // Agrega el usuario a la base de datos
    EmpresaAgregar($nuevaEmpresa);

    return [
        
        "nombre" => $nombre,
        "direccion" => $direccion,
        "telefono" => $telefono
    
    ];
});