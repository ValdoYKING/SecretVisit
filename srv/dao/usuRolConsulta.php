<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Rol[] */
function usuRolConsulta(int $usuId)
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    UR.ROL_ID AS id,
    R.ROL_DESCRIPCION AS descripcion
   FROM USU_ROL UR, ROL R
   WHERE
    UR.ROL_ID = R.ROL_ID
    AND UR.USU_ID = :usuId
   ORDER BY UR.ROL_ID"
 );
 $stmt->execute([":usuId" => $usuId]);
 $resultado = $stmt->fetchAll(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Rol::class
 );
 return recibeFetchAll($resultado);
}
