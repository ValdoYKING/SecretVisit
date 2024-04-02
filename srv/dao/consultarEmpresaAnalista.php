<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Empresa.php";
require_once __DIR__ . "/AccesoBd.php";

/** @return Empresa[] */
function consultarEmpresaAnalista($id): array
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT
            EMP_ID as id,
            EMP_NOMBRE as nombre,
            EMP_DIRECCION as direccion,
            EMP_TELEFONO as telefono,
            EMP_CALIFICACION as calificacion
        FROM EMPRESA
        WHERE ID_ANALISTA = :id
        ORDER BY EMP_ID"
    );
    $stmt->execute([':id' => $id]);
    $resultado = $stmt->fetchAll(
        PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
        Empresa::class
    );
    return recibeFetchAll($resultado);
}
