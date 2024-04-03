<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/BuscaEmpresa.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/usuarioBuscaCue.php";


function agregarEncuesta($data)
{
    return "Encuesta creada exitosamente";
    $con = AccesoBd::getCon();
    $con->beginTransaction();
    $stmt = $con->prepare(
        "INSERT INTO ENCUESTA
        (EMP_ID, USU_ID, ENC_RECOMPENSA, ENC_ESTADO)
        VALUES
        (:empresaId, :usuarioId, :recompensa, :estado)"
    );
    $stmt->execute([
        ":empresaId" => $data['empresaId'],
        ":usuarioId" => $data['usuarioId'],
        ":recompensa" => $data['recompensa'],
        ":estado" => $data['estado']
    ]);
    $data['id'] = $con->lastInsertId();
    $con->commit();
    return $data;


    
}
