<?php
require_once __DIR__ . "/AccesoBd.php";

function cuentaEncuesta(): false|int {

    $con = AccesoBd::getCon();
    $stmt = $con->query("SELECT COUNT(*) FROM ENCUESTA");
    return $stmt->fetchColumn();
}