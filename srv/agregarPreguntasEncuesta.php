<?php

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/EncuestaPreguntaAgregar.php";

function agregarPreguntasEncuesta(Encuesta $encuesta, array $preguntaIds, Usuario $usuario)
{
    foreach ($preguntaIds as $preguntaId) {
        $pregunta = new Pregunta();
        $pregunta->id = $preguntaId;

        $encuestaPregunta = new Encuesta_Pregunta();
        $encuestaPregunta->encuesta = $encuesta;
        $encuestaPregunta->pregunta = $pregunta;

        agregarEncuestaPregunta($encuestaPregunta);
    }
}


?>
