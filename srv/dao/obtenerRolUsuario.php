<?php

require_once __DIR__ . "/AccesoBd.php";

function obtenerRolUsuario(int $usuId)
{
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT UR.ROL_ID
        FROM USU_ROL UR
        WHERE UR.USU_ID = :usuId
        LIMIT 1"
    );
    $stmt->execute([":usuId" => $usuId]);
    $rolId = $stmt->fetchColumn();
    return $rolId;
}
