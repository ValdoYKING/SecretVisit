<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";
require_once __DIR__ . "/dao/consultaPreguntas.php";
require_once __DIR__ . "/dao/consultaEncuestasMystery.php";

// Verifica si el idEnc ha sido enviado y es válido
if (isset($_POST['idEnc']) && is_numeric($_POST['idEnc'])) {
    // Obtén el idEnc enviado desde el formulario
    $idEnc = $_POST['idEnc'];

    // Redirige a la página HTML con el idEnc como parámetro GET en la URL
    header("Location: ../encuestaMystery.html?idEnc=" . urlencode($idEnc));
    exit;
} else {
    // Si el idEnc no fue enviado o no es válido, devuelve un mensaje de error
    echo json_encode(array('error' => 'El idEnc no fue enviado o es inválido'));
}
?>
