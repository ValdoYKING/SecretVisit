<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";
require_once __DIR__ . "/dao/consultaPreguntas.php";
require_once __DIR__ . "/dao/consultaEncuestasMystery.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = respuestasTotalPreguntas();
    echo json_encode($response);
} else {
    $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
    echo json_encode($response);
}
?>
