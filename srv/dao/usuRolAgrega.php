<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/AccesoBd.php";

function usuRolAgrega(Usuario $usuario) {
 $roles = $usuario->roles;
 if (sizeof($roles) > 0) {
  $con = AccesoBd::getCon();
  $stmt = $con->prepare(
   "INSERT INTO USU_ROL
     (USU_ID, ROL_ID)
    VALUES
     (:usuId, :rolId)"
  );
  foreach ($roles as $rol) {
   $stmt->execute(
    [
     ":usuId" => $usuario->id,
     ":rolId" => $rol->id
    ]
   );
  }
 }
}
