<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";


function EmpresaAgregar(Empresa $modelo)
{
 $modelo->valida();
 $con = AccesoBd::getCon();
 $con->beginTransaction();
 $stmt = $con->prepare(
  "INSERT INTO EMPRESA
    (EMP_NOMBRE,EMP_DIRECCION,EMP_TELEFONO,EMP_CALIFICACION)
   VALUES
    (:nombre, :direccion, :telefono, :calificacion)"
 );
 $stmt->execute([
  ":nombre" => $modelo->nombre,
  ":direccion" => $modelo->direccion,
  ":telefono" => $modelo->telefono,
  ":calificacion" => 0
  ]);
 /* Si usas una secuencia para generar el id,
  * pasa como parámetro de lastInsertId el
  * nombre de dicha secuencia. */
  $modelo->id = $con->lastInsertId();
  $con->commit();
}
