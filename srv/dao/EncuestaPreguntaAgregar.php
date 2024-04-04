<?php

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function agregarEncuestaPregunta(int $iden,int $id, string $text,int $idana )
{
    
        $con = AccesoBd::getCon();
        $con->beginTransaction();
        // Preparar la consulta SQL
        $stmt = $con->prepare("INSERT INTO ENC_PRE (ENC_ID, PRE_ID, ENCPRE_RESPUESTA,ID_MYSTERY) VALUES (?, ?, ?, ?)");

        // Vincular los parámetros
        $stmt->bindParam(1, $iden, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->bindParam(3, $text, PDO::PARAM_STR);
        $stmt->bindParam(4, $idana, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();
        
        $encuesta = [
            "ENC_ID" => $iden,
            "PRE_ID" => $iden,
            "ENCPRE_RESPUESTA" => $iden,
        ];
        $con->commit();
        // Retornar true si la inserción fue exitosa
        return $encuesta;
  
}
?>
