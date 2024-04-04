<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function actualizarEncuestaPreguntaMystery(int $idEnc, int $idPregunta, string $respuesta, int $idMystery)
{
    try {
        $con = AccesoBd::getCon();
        
        // Preparar la consulta SQL de actualización
        $stmt = $con->prepare("UPDATE ENC_PRE SET ENCPRE_RESPUESTA = ?, ID_MYSTERY = ? WHERE ENC_ID = ? AND PRE_ID = ?");

        // Vincular los parámetros
        $stmt->bindParam(1, $respuesta, PDO::PARAM_STR);
        $stmt->bindParam(2, $idMystery, PDO::PARAM_INT);
        $stmt->bindParam(3, $idEnc, PDO::PARAM_INT);
        $stmt->bindParam(4, $idPregunta, PDO::PARAM_INT);

        // Ejecutar la consulta de actualización
        $stmt->execute();

        // Retornar true si la actualización fue exitosa
        return true;
    } catch (Exception $e) {
        throw new Exception("Error al actualizar la pregunta en la encuesta: " . $e->getMessage());
    }
}

?>
