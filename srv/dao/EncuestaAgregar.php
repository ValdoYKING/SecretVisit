<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/AccesoBd.php";

function agregarEncuesta(Encuesta $encuesta)
{
    try {
        $con = AccesoBd::getCon();
        
        // Validar la encuesta
        $encuesta->valida();

        // Preparar la consulta SQL
        $stmt = $con->prepare("INSERT INTO ENCUESTA (EMP_ID, USU_ID, ENC_RECOMPENSA) VALUES (?, ?, ?)");

        // Vincular los parámetros
        $stmt->bindParam(1, $encuesta->empresa->id, PDO::PARAM_INT);
        $stmt->bindParam(2, $encuesta->usuario->id, PDO::PARAM_INT);
        $stmt->bindParam(3, $encuesta->recompensa, PDO::PARAM_STR);

        // Obtener el ID de la nueva encuesta insertada
        $encuesta->id = $con->lastInsertId();

        // Retornar la encuesta agregada
        return $encuesta;
    } catch (Exception $e) {
        throw new Exception("Error al agregar la encuesta: " . $e->getMessage());
    }
}
?>
