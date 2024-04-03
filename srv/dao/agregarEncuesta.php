<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/BuscaEmpresa.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/usuarioBuscaCue.php";


function agregarEncuesta(int $idemp,int $idusu,String $text)
{
    $con = AccesoBd::getCon();
    $empresa = BuscaEmpresa($idemp);
    //$usuario = usuarioBuscaCue($idusu);
    if ($empresa === false)
        throw new Exception("Empresa no encontrada.");
    //if ($usuario === false)
      //  throw new Exception("Usuario no encontrado.");
 

    $stmt = $con->prepare(
        "INSERT INTO ENCUESTA
        (EMP_ID, USU_ID, ENC_RECOMPENSA)
        VALUES
        (:empId, :usuId, :recompensa)"
    );

    $stmt->execute([
        "empId" => $empresa->id,
        "usuId" => $idusu,
        "recompensa" => $text
    ]);

    // echo "Encuesta insertada con ID: " . $modelo->id . "\n"; // Agrega mensajes de depuración
    
    $datos = [
        "idemp" => $idemp,
        "idusu" => $idusu,
        "recompensa" =>$text
    ];
    return $datos; // Devuelve el ID de la encuesta creada
}
