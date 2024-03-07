<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/AccesoBd.php";

function BuscaEncuesta(int $id): false|Encuesta
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
      ENC_ID as id,
      EMP_ID as idempresa,
      USU_ID as idusuario,
      ENC_RECOMPENSA as recompensa
   FROM ENCUESTA
   WHERE ENC_ID = :id"  
 );
 $stmt->execute([":id" => $id]);
 $stmt -> setFetchMode(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Encuesta::class
 );
 return $stmt->fetch();
}


  function obtenerUltimoIdEncuesta(): ?int
{
    $con = AccesoBd::getCon();
    $stmt = $con->query("SELECT MAX(ENC_ID) as last_id FROM ENCUESTA");
    $lastId = $stmt->fetch(PDO::FETCH_ASSOC)['last_id'];
    return $lastId !== null ? (int)$lastId : null;
}
  