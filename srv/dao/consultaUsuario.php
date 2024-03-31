<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/AccesoBd.php";

function obtenerUsuarios()
{
    $con = AccesoBd::getCon();
    $stmt = $con->query(
        "SELECT USU_ID as id, USU_CUE as cue, USU_CORREO as correo FROM USUARIO
    );
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
}
?>
