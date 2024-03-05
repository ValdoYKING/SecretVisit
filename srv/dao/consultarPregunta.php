<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Rol[] */
function consultarPregunta()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    PRE_ID
    PRE_RESPUESTA
   FROM PREGUNTA
   ORDER BY PRE_ID"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Rol::class
 );
 return recibeFetchAll($resultado);
}
