<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/usuRolConsulta.php";

function usuarioBuscaCue(string $cue)
{
 $con = AccesoBd::getCon();
 $stmt = $con->prepare(
  "SELECT
    USU_ID as id,
    USU_CUE as cue,
    USU_CORREO as correo,
    USU_MATCH as match
   FROM USUARIO
   WHERE USU_CUE = :cue"
 );
 $stmt->execute([":cue" => $cue]);
 $stmt->setFetchMode(
  PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
  Usuario::class
 );
 /** @var false|Usuario */
 $usuario = $stmt->fetch();
 if ($usuario === false) {
  return false;
 } else {
  $usuario->roles = usuRolConsulta($usuario->id);
  return $usuario;
 }
}
