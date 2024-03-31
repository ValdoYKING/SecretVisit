<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function agregarEncuestaPregunta(Encuesta_Pregunta $encuestaPregunta)
{
    try {
        $con = AccesoBd::getCon();
        
        // Preparar la consulta SQL
        $stmt = $con->prepare("INSERT INTO ENC_PRE (ENC_ID, PRE_ID, ENCPRE_RESPUESTA,ID_MYSTERY) VALUES (?, ?, ?, ?)");

        // Vincular los parámetros
        $stmt->bindParam(1, $encuestaPregunta->encuesta->id, PDO::PARAM_INT);
        $stmt->bindParam(2, $encuestaPregunta->pregunta->id, PDO::PARAM_INT);
        $stmt->bindParam(3, $encuestaPregunta->respuesta, PDO::PARAM_STR);
        $stmt->bindParam(4, $encuestaPregunta->idMystery, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar true si la inserción fue exitosa
        return true;
    } catch (Exception $e) {
        throw new Exception("Error al asociar pregunta a la encuesta: " . $e->getMessage());
    }
}
?>
