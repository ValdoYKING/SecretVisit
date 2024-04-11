<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/BuscaEmpresa.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/usuarioBuscaCue.php";


function agregarEncuesta(int $idemp,int $idana,string $text)
{
    $con = AccesoBd::getCon();
    $con->beginTransaction();
    $stmt = $con->prepare(
        "INSERT INTO ENCUESTA
        (EMP_ID, USU_ID, ENC_RECOMPENSA,RESPONDIDA)
        VALUES
        (:empresaId, :usuarioId, :recompensa,0)"
    );
    $stmt->execute([
        ":empresaId" => $idemp,
        ":usuarioId" => $idana,
        ":recompensa" => $text
    ]);

    $data['id'] = $con->lastInsertId();
    $con->commit();
    return $data;
    
}
