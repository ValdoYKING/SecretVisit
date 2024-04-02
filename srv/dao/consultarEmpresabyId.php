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
   EMP_CALIFICACION as calificacion,
   ID_ANALISTA as analistaid,
   ID_ENC as encid
  FROM 'EMPRESA' 
   WHERE ID_ANALISTA = '$id'"
 );
 $resultado = $stmt -> fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Empresa::class
 );
 return recibeFetchAll($resultado);
}