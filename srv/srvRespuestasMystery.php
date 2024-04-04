<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";
require_once __DIR__ . "/dao/consultaEncuestasMystery.php";

// Establecer el encabezado para especificar la codificación de caracteres UTF-8
header('Content-Type: application/json; charset=utf-8');

// Obtener los datos y convertirlos a JSON
echo json_encode(listaEncuestaMystery(), JSON_UNESCAPED_UNICODE);
