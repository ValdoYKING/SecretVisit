<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Empresa[] */
function consultarEmpresabyId($id): array
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT 
            EMP_ID as id,
            EMP_NOMBRE as nombre,
            EMP_DIRECCION as direccion,
            EMP_TELEFONO as telefono,
            EMP_CALIFICACION as calificacion,
            ID_ANALISTA as analistaid,
            ID_ENC as encuesta
        FROM EMPRESA
        WHERE ID_ANALISTA = :id"
    );
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $empresas = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $empresa = new Empresa(
            $row['calificacion'],
            $row['nombre'],
            $row['direccion'],
            $row['telefono'],
            null, // No estoy seguro de cómo obtienes el usuario, así que lo dejo como null
            $row['encuesta'],
            $row['id']
        );
        $empresas[] = $empresa;
    }

    return $empresas;
}
