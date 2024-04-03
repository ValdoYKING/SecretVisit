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



/* 
[5:28 p. m., 2/4/2024] Oscar Varela: en el arreglo de preguntas va id, pregunta, respuesta
[5:28 p. m., 2/4/2024] Oscar Varela: el id es int, preunta string, respuesta, string
*/
// Función para procesar las respuestas enviadas por el formulario y actualizarlas en la base de datos

/*     $registros = [
        ["idU" => 2, "idE" => 2, "pregunta" => "¿Cuál es tu nombre?", "respuesta" => "Mi nombre es Juan."],
        ["idU" => 2, "idE" => 2, "pregunta" => "¿Cuál es tu edad?", "respuesta" => "Tengo 25 años."]
      ];
      
    $idT = leeTexto("empid");
    $id = intval($idT);
 */


 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['id']) ) {
        $id = $data['id'];
                      $response=  consultarEmpresabyId($id);
                        echo json_encode($response);
        
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan datos en la solicitud');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
    echo json_encode($response);
}
/* 
if (isset($_POST['preguntaId'], $_POST['respuestas'])) {
    $preguntaIds = $_POST[''];
    
    $respuestas = $_POST['respuestas'];
    
        $MOencuesta = BuscaEncuestaidEmpresa($id);
        $idEnc = $MOencuesta->id;
        $dato[] = $_POST['preguntaId'];
        

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
?>
