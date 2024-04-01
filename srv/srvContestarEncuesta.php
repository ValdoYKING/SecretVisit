<?php

require_once __DIR__ . "/modelo/Encuesta.php";
require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeEntero.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/dao/registrarrespuestas.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";
require_once __DIR__ . "/dao/consultarEnc_Pre.php";
require_once __DIR__ . "/agregarRespuestaEncuesta.php";


 // Agrega la inclusión del archivo de actualización

// Función para procesar las respuestas enviadas por el formulario y actualizarlas en la base de datos
ejecuta(function ()
{
    $idT = leeTexto("empid");
    $id = intval($idT);

    $MOencuesta = BuscaEncuestaidEmpresa($id);
    $idEnc = $MOencuesta->id;
    $dato[] = $_POST['preguntaId'];

    
    /*
    if (isset($_POST['preguntaId'], $_POST['respuestas'])) {
        $preguntaIds = $_POST['preguntaId'];
    
        $respuestas = $_POST['respuestas'];

        $encPre = new Encuesta_Pregunta();
        $encPre->encuesta->id = $idEnc;
        $encPre->pregunta->id = $preguntaIds;
        $encPre->respuesta = $respuestas;

        if ($encPre->encuesta->id === null) {
            throw new Exception("Error: ID de encuesta inválido");
        } 

        if (!is_array($preguntaIds) || !is_array($respuestas)) {
            throw new Exception("Error: Los datos recibidos no son válidos");
        }

        
        agregarRespuestaEncuesta($idEnc, $preguntaIds,$respuestas);
        return "Encuesta contestada";
} else {
    return "Algo salio mas cheque bien sus respuestas";
}
*/
}
);
?>
