<?php
require_once __DIR__ . "/AccesoBd.php";

function cuentaPregunta(): false|int {

    $con = AccesoBd::getCon();
    $stmt = $con->query("SELECT COUNT(*) FROM PREGUNTA");
    return $stmt->fetchColumn();
}