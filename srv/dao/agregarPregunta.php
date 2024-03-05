<?php

require_once __DIR__ . "/../modelo/Preguntas.php";
require_once __DIR__ . "/AccesoBd.php";


function agregarPregunta(Preguntas $modelo)
{
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "INSERT INTO PREGUNTA
    (PRE_PREGUNTA)
   VALUES
    (:apregunta)"
 );
 $stmt->execute([
  ":apregunta" => $modelo->pregunta
  ]);
 /* Si usas una secuencia para generar el id,
  * pasa como parámetro de lastInsertId el
  * nombre de dicha secuencia. */
  $modelo->id = $con->lastInsertId();
}
