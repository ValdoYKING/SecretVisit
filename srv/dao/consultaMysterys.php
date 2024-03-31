<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

function consultarMystery()
{
    $con = AccesoBd::getCon();
  $stmt = $con->query("
      SELECT 
          USUARIO.USU_ID as id, 
          USUARIO.USU_CUE as cue, 
          USUARIO.USU_CORREO as correo 
      FROM 
          USUARIO 
      INNER JOIN 
          USU_ROL ON USUARIO.USU_ID = USU_ROL.USU_ID 
      WHERE 
          USU_ROL.ROL_ID = 'Mystery Shopper'
  ");
    $mystery = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $mystery;
}
?>
