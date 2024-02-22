<?php

require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/AccesoBd.php";

function rolAgrega(Rol $modelo)
{
 $modelo->valida();
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "INSERT INTO ROL
    (ROL_ID, ROL_DESCRIPCION)
   VALUES
    (:id, :descripcion)"
 );
 $stmt->execute([
  ":id" => $modelo->id,
  ":descripcion" => $modelo->descripcion
 ]);
}
