<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/AccesoBd.php";

function actualizaEncuestaRes($idEnc){
    $con = AccesoBd::getCon(); // Obtener la conexión a la base de datos
    $stmt = $con->prepare(
        "UPDATE ENCUESTA
        SET RESPONDIDA = 1
        WHERE ENC_ID = :idEnc"
    );

    $stmt->bindParam(':idEnc', $idEnc, PDO::PARAM_INT);
    $stmt->execute();
    
    // Verificar si se realizaron actualizaciones
    $filasActualizadas = $stmt->rowCount();
    
    return $filasActualizadas;
}

?>
