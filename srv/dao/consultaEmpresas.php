<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

function obtenerEmpresas()
{
    $con = AccesoBd::getCon();
    $stmt = $con->query(
        "SELECT EMP_ID as id, EMP_NOMBRE as nombre, EMP_DIRECCION as direccion, EMP_TELEFONO as telefono, EMP_CALIFICACION as calificacion FROM EMPRESA"
    );
    $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $empresas;
}
?>
