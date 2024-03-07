<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/BuscaEmpresa.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/usuarioBuscaCue.php";


function agregarEncuesta(Encuesta $modelo)
{
    $con = AccesoBd::getCon();
    $empresa = BuscaEmpresa($modelo->empresa->id);
    $usuario = usuarioBuscaCue($modelo->usuario->cue);
    if ($empresa === false)
        throw new Exception("Empresa no encontrada.");
    if ($usuario === false)
        throw new Exception("Usuario no encontrado.");
    $modelo->empresa = $empresa;
    $modelo->usuario = $usuario;
    $modelo->valida();

    $stmt = $con->prepare(
        "INSERT INTO ENCUESTA
        (EMP_ID, USU_ID, ENC_RECOMPENSA)
        VALUES
        (:empId, :usuId, :recompensa)"
    );

    $stmt->execute([
        "empId" => $empresa->id,
        "usuId" => $usuario->id,
        "recompensa" => $modelo->recompensa
    ]);

    echo "Encuesta insertada con ID: " . $modelo->id . "\n"; // Agrega mensajes de depuración
    $modelo->id = $con->lastInsertId();

    return $modelo->id; // Devuelve el ID de la encuesta creada
}
