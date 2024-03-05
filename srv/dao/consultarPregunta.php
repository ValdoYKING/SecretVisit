<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function consultarPregunta()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    PRE_ID
    PRE_PREGUNTA
   FROM PREGUNTA
   ORDER BY PRE_ID"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_OBJ
 );
 return recibeFetchAll($resultado);
}
