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
  
function BuscaEncuestaidEmpresa(int $id): false|Encuesta
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT
            ENC_ID as id,
            ENC_RECOMPENSA as recompensa
         FROM ENCUESTA
         WHERE EMP_ID = :ids"
    );
    $stmt->execute([":ids" => $id]);
    $stmt->setFetchMode(
        PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
        Encuesta::class
    );
    $encuesta = $stmt->fetch();

    // Si no se encontró ninguna encuesta, devolvemos false
    if (!$encuesta) {
        return false;
    }

    // Creamos una instancia de Empresa y Usuario con valores nulos por ahora
    $empresa = null;
    $usuario = null;

    // Creamos la instancia de Encuesta con los valores adecuados
    return new Encuesta($empresa, $usuario, $encuesta->recompensa, $encuesta->id);
}



function listaEncuesta() {
  $con = AccesoBd::getCon();
  $stmt = $con->query(
    "SELECT    
    E.ENC_ID as idEnc,
    E.EMP_ID as idEmp,
    E.USU_ID as idUsu,
    EM.EMP_NOMBRE as nombreEmpresa
      FROM ENCUESTA E
    JOIN EMPRESA EM ON E.EMP_ID = EM.EMP_ID;"
  );

  $encuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $encuesta;
}