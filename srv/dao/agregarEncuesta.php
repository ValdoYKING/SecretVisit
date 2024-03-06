<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/AccesoBd.php";


function agregarEncuesta(Encuesta $modelo)
{
    $modelo->valida();
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "INSERT INTO ENCUESTA
        ()
        VALUES
        ()"
    );

    $stmt->execute(
        (
            [
                ""
            ]
        )
            );
    $modelo->id = $con->lastInsertId();
}
/** Falta terminar */