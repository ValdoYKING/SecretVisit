<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Empresa[] */
function consultarEmpresabyId($id): array
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    EMP_ID as id,
    EMP_NOMBRE as nombre,
    EMP_DIRECCION as direccion,
    EMP_TELEFONO as telefono,
    EMP_CALIFICACION as calificacion
   FROM EMPRESA
   WHERE ID_ANALISTA = ?
   ORDER BY EMP_ID"
 );
 $resultado = $stmt -> fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Empresa::class
 );
 return recibeFetchAll($resultado);
}