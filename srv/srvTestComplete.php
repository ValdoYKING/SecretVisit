<?php

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/actualizaEncuestaPregunta.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";

// Verifica si se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se recibieron los datos esperados
    if (isset($_POST['idEmp'], $_POST['respuestas'], $_POST['idMystery']) && is_array($_POST['respuestas'])) {
        // Obtiene los datos recibidos del formulario
        $idEmp = $_POST['idEmp']; // ID de la empresa
        $respuestas = $_POST['respuestas']; // Respuestas enviadas desde el formulario
        $idMystery = $_POST['idMystery']; // ID del Mystery obtenido de la sesión

        // Busca el ID de la encuesta asociada a la empresa
        $encuesta = BuscaEncuestaidEmpresa($idEmp);
        if ($encuesta) {
            $idEncuesta = $encuesta->id;

            // Recorre todas las preguntas y sus respuestas
            foreach ($respuestas as $idPregunta => $respuesta) {
                // Verifica si la respuesta es válida (0 o 1)
                if ($respuesta === '0' || $respuesta === '1') {
                    // Agrega la pregunta a la encuesta con la respuesta correspondiente
                    actualizarEncuestaPreguntaMystery($idEncuesta, $idPregunta, $respuesta, $idMystery);
                } else {
                    // Si la respuesta no es válida, puedes manejarlo de acuerdo a tus necesidades
                    // Por ejemplo, registrar un error o simplemente ignorar la respuesta incorrecta
                    echo "Respuesta no válida para la pregunta $idPregunta: $respuesta";
                }
            }

            // Aquí puedes agregar cualquier otra lógica que necesites después de procesar las respuestas
            // Por ejemplo, redireccionar a una página de éxito o mostrar un mensaje al usuario
            echo "¡Respuestas procesadas correctamente!";
            
        } else {
            echo "No se encontró una encuesta asociada a la empresa con ID $idEmp";
        }
    } else {
        echo "Datos incompletos o incorrectos recibidos del formulario";
    }
} else {
    echo "Se esperaba una solicitud POST";
}
?>
