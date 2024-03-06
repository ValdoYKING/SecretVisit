<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

/**@return Pregunta[] */
function consultarPregunta():array
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    PRE_ID AS id,
    PRE_PREGUNTA AS pregunta
   FROM PREGUNTA
   ORDER BY PRE_ID"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Pregunta::class
 );
 return recibeFetchAll($resultado);
}
