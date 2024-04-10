<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";
require_once __DIR__ . "/dao/consultaPreguntas.php";
require_once __DIR__ . "/dao/consultaEncuestasMystery.php";

// Verifica si el idEnc ha sido enviado y es válido

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['idEnc'])) {
        $idEnc = $data['idEnc'];
        $response = listaRespuestaPreguntaEnc($idEnc); // Utilizando la nueva función
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan datos en la solicitud');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
    echo json_encode($response);
}
?>
