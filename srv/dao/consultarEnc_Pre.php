
<?php 

require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";
require_once __DIR__ . "/BuscaEncuesta.php";
require_once __DIR__ . "/BuscaPregunta.php";

function consultarEnc_Pre(int $encId)
{
    $encuesta = BuscaEncuesta($encId);
    if ($encuesta === false) {
        return false;
    }

    $con = AccesoBd::getCon();
    $stmt = $con->prepare("
        SELECT
        EP.ID AS encpreId,
        P.PRE_PREGUNTA AS pregunta,
        EM.EMP_NOMBRE AS empresaNombre
    FROM ENC_PRE EP
    JOIN ENCUESTA E ON EP.ENC_ID = E.ENC_ID
    JOIN PREGUNTA P ON EP.PRE_ID = P.PRE_ID
    JOIN EMPRESA EM ON E.EMP_ID = EM.EMP_ID
        WHERE EP.ENC_ID = :encId 
    ");
    $stmt->bindParam(':encId', $encId, PDO::PARAM_INT);
    $stmt->execute();
    
    $encuestas_preguntas = array(); // Almacenar todas las instancias de Encuesta_Pregunta

    while ($result = $stmt->fetch(PDO::FETCH_OBJ)) {
        $enc_pre = new Encuesta_Pregunta();
        $enc_pre->encuesta = new Encuesta(); // Crear una nueva instancia de Encuesta
        $enc_pre->encuesta->id = $result->encpreId; // Asignar el ID de la encuesta
        $enc_pre->pregunta = new Pregunta(); // Crear una nueva instancia de Pregunta
        $enc_pre->pregunta->pregunta = $result->pregunta; // Asignar el texto de la pregunta
         
        $empresa = new Empresa();
        $empresa->nombre = $result->empresaNombre;
        $enc_pre->encuesta->empresa = $empresa;

        $encuestas_preguntas[] = $enc_pre; // Agregar a la lista de Encuesta_Pregunta
    }
    
    return $encuestas_preguntas; 
}