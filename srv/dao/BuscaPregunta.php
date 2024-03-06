<?php

require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function BuscaPregunta(int $id): false|Pregunta
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
    PRE_ID as id,
    PRE_PREGUNTA as pregunta
   FROM PREGUNTA
   WHERE PRE_ID = :id"  
 );
 $stmt->execute([":id" => $id]);
 $stmt -> setFetchMode(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Pregunta::class
 );
 return $stmt->fetch();
}
