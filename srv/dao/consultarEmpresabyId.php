<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Empresa[] */
function consultarEmpresabyId($id): array
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT * FROM 'EMPRESA' WHERE ID_ANALISTA	= '$id'"
 );
 $resultado = $stmt -> fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Empresa::class
 );
 return recibeFetchAll($resultado);
}