<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

function BuscaEmpresa(int $id): false|Empresa
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
      EMP_ID as id,
      EMP_NOMBRE as nombre,
      EMP_DIRECCION as direccion,
      EMP_TELEFONO as telefono
   FROM EMPRESA
   WHERE EMP_ID = :id"  
 );
 $stmt->execute([":id" => $id]);
 $stmt -> setFetchMode(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Empresa::class
 );
 return $stmt->fetch();
}
