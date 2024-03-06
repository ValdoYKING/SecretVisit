<?php

require_once __DIR__ . "/Pregunta.php";
require_once __DIR__ . "/Encuesta.php";

class Encuesta_Pregunta
{
    public ?Pregunta $pregunta;
    public ?Encuesta $encuesta;
    public string $respuesta;

    public function __construct(
        string $respuesta = "",
        ?Pregunta $pregunta = null,
        ?Encuesta $encuesta = null
    )
    {
        $this->respuesta = $respuesta;
        $this->pregunta = $pregunta;
        $this->encuesta = $encuesta;
    }

    public function valida()
    {
        if ($this->pregunta === null)
        throw new Exception("Falta alguna pregunta.");
        if ($this->encuesta === null)
        throw new Exception("Falta la encuesta.");
    }

}

/** Checar */