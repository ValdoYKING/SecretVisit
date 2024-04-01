<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

function ObtenerEmpresasPorId($id)
{
    $con = AccesoBd::getCon();
    $stmt = $con->query(
        "SELECT EMP_ID as id, EMP_NOMBRE as nombre, EMP_DIRECCION as direccion, EMP_TELEFONO as telefono, EMP_CALIFICACION as calificacion FROM EMPRESA WHERE EMP_ID = $id"
    );
    $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $empresas;
}
?>
