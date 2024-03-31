<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/AccesoBd.php";

function obtenerUsuarios()
{
    $con = AccesoBd::getCon();
    $stmt = $con->query(
        "SELECT 
    USUARIO.USU_ID as id, 
    USUARIO.USU_CUE as cue, 
    USUARIO.USU_CORREO as correo,
    USU_ROL.ROL_ID as rol_id  -- Seleccionar el ID del rol
FROM 
    USUARIO 
INNER JOIN 
    USU_ROL ON USUARIO.USU_ID = USU_ROL.USU_ID
        "
    );
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
}
?>
