<?php

require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function obtenerPreguntas()
{
    $con = AccesoBd::getCon();
    $stmt = $con->query(
        "SELECT PRE_ID as id, PRE_PREGUNTA as pregunta FROM PREGUNTA"
    );
    $preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $preguntas;
}

?>
