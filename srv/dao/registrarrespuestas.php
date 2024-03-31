<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function actualizarEncuestaPregunta(Encuesta_Pregunta $modelo)
{


    $con = AccesoBd::getCon();
    
    // Prepara la consulta para actualizar la respuesta en la tabla ENC_PRE
    $stmt = $con->prepare(
        "UPDATE ENC_PRE
         SET ENCPRE_RESPUESTA = :respuesta
         WHERE ENC_ID = :encuestaId AND PRE_ID = :preguntaId"
    );

    // Ejecuta la consulta con los valores proporcionados
    $stmt->execute([
        ':respuesta' => $modelo->respuesta,
        ':encuestaId' => $modelo->encuesta->id,
        ':preguntaId' => $modelo->pregunta->id
    ]);
}



