<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/usuRolAgrega.php";

function usuarioAgrega(Usuario $modelo)
{
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "INSERT INTO USUARIO
    (USU_CUE, USU_CORREO, USU_MATCH)
   VALUES
    (:cue, :correo, :match)"
 );
 $stmt->execute([
  ":cue" => $modelo->cue,
  ":correo" => $modelo->correo,
  ":match" => password_hash($modelo->match, PASSWORD_DEFAULT)
 ]);
 /* Si usas una secuencia para generar el id,
  * pasa como parámetro de lastInsertId el
  * nombre de dicha secuencia. */
 $modelo->id = $con->lastInsertId();
 usuRolAgrega($modelo);
 $con->commit();
}
