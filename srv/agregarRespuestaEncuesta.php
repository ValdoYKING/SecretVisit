<?php

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/registrarrespuestas.php";

function agregarRespuestaEncuesta( int $encId, array $preguntasIds, array $respuestas)
{

    if (0==0){
        return "funciona";
    }
    if (count($preguntasIds) !== count($respuestas)) {
        throw new Exception("Error: La cantidad de preguntas y respuestas no coincide");
    }




    }

?>
