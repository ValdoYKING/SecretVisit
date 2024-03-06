<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/BuscaPregunta.php";
require_once __DIR__ . "/BuscaEncuesta.php";

function detalleDeVentaAgrega(Encuesta_Pregunta $modelo)
{
 $con = AccesoBd::getCon();
 $pregunta = BuscaPregunta($modelo->pregunta->id);
 if ($pregunta === false)
  throw new Exception("pregunta no encontrado.");
 $encuesta = BuscaEncuesta($modelo->encuesta->id);
 if ($encuesta === false)
  throw new Exception("Encuesta no encontrada.");
 $modelo->encuesta = $encuesta;
 $modelo->pregunta = $pregunta;
 $modelo->valida();
 $stmt = $con->prepare(
  "INSERT INTO ENC_PRE
     (, DTV_CANTIDAD, DTV_PRECIO)
    VALUES
     (:ventId, :prodId, :cantidad, :precio)"
 );
 $stmt->execute(
  [
   ":ventId" => $encuesta->id,
   
  ]
 );
}
/** Falta Terminar */