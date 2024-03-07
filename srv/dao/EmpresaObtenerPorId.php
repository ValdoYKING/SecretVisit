<?php

require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

function obtenerEmpresaPorId($id)
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare("SELECT EMP_ID as id, EMP_NOMBRE as nombre, EMP_DIRECCION as direccion, EMP_TELEFONO as telefono, EMP_CALIFICACION as calificacion FROM EMPRESA WHERE EMP_ID = ?");
    $stmt->execute([$id]);
    $empresaData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$empresaData) {
        return null;
    }

    // Crear objeto Empresa con los datos obtenidos de la base de datos
    $empresa = new Empresa(
        $empresaData['calificacion'],
        $empresaData['nombre'],
        $empresaData['direccion'],
        $empresaData['telefono'],
        $empresaData['id']
    );

    return $empresa;
}

?>
