<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";


function EmpresaAgregar(Empresa $modelo)
{
 $modelo->valida();
 $con = AccesoBd::getCon();
 $usuario = usuarioBuscaCue($modelo->usuario->cue);
 if ($usuario === false)
 throw new Exception("Usuario no encontrado.");
 $modelo->usuario = $usuario;
 $con->beginTransaction();
 $modelo->valida();
 $stmt = $con->prepare(
  "INSERT INTO EMPRESA
    (EMP_NOMBRE,EMP_DIRECCION,EMP_TELEFONO,EMP_CALIFICACION,ID_ANALISTA,ID_ENC)
   VALUES
    (:nombre, :direccion, :telefono, :calificacion, :idAnalista, :idEncuesta)"
 );
 $stmt->execute([
  ":nombre" => $modelo->nombre,
  ":direccion" => $modelo->direccion,
  ":telefono" => $modelo->telefono,
  ":calificacion" => 0,
  ":idAnalista" => $usuario->id,
  ":idEncuesta" => $modelo->encuesta
  ]);
 /* Si usas una secuencia para generar el id,
  * pasa como parámetro de lastInsertId el
  * nombre de dicha secuencia. */
  $modelo->id = $con->lastInsertId();
  $con->commit();
}
