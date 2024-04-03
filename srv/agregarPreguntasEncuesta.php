<?php

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/EncuestaPreguntaAgregar.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";

function agregarPreguntasEncuesta(int $idemp, array $preguntaIds, int $idana)
{
    $encu =  BuscaEncuestaidEmpresa($idemp);
    $idEncuesta = $encu->id;
    foreach ($preguntaIds as $pregunta) {
        

        agregarEncuestaPregunta($idEncuesta ,$pregunta, "",$idana);
    }
}


?>
