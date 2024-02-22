<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Rol[] */
function rolConsulta()
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    ROL_ID as id,
    ROL_DESCRIPCION as descripcion
   FROM ROL
   ORDER BY ROL_ID"
 );
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Rol::class
 );
 return recibeFetchAll($resultado);
}
