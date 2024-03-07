<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/dao/enc_preAgregar.php";
require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";


ejecuta(function ()
{

    $idpregunta = trim(leeTexto("preguntasE"));
   
    

    // crea un nuevo objeto Usuario con los datos del formulario
    $nuevaencpre = new Encuesta_Pregunta();



    // Agrega el usuario a la base de datos
    enc_preAgregar($nuevaencpre);

    return [
        
        "nombre" => $nombre,
        "direccion" => $direccion,
        "telefono" => $telefono
    
    ];
});
