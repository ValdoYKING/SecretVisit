<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/modelo/Encuesta.php";
require_once __DIR__ . "/modelo/Empresa.php";
require_once __DIR__ . "/dao/EncuestaAgregar.php";
require_once __DIR__ . "/dao/agregarEncuesta.php";
require_once __DIR__ . "/const/EMPRESA.php";
require_once __DIR__ . "/agregarPreguntasEncuesta.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";

ejecuta(function () {
    // Verifica si se recibieron los datos del formulario
    if (isset($_POST['empresaId'], $_POST['preguntaId'])) {
        $empresaId = $_POST['empresaId'];
        $preguntaIds = $_POST['preguntaId'];
        $cue = leeTexto('cue');

        // Crear un objeto Empresa con el ID recibido
        $empresa = new Empresa();
        $empresa->id = $empresaId;

        // Validar que el objeto Empresa se haya creado correctamente
        if ($empresa->id === null) {
            throw new Exception("Error: ID de empresa inválido");
        }

        $usuario = new Usuario();
        // $usuario->cue = $_SESSION[CUE];
        $usuario->cue = $cue;

        // Crear una nueva encuesta
        $encuesta = new Encuesta($empresa, $usuario, 'Recompensa por defecto', 0);

        // Agrega la encuesta a la base de datos
        agregarEncuesta($encuesta);

        // Llamar a otro archivo para agregar las preguntas a la encuesta
        
        agregarPreguntasEncuesta($encuesta, $preguntaIds, $usuario);

        // Retorna un mensaje de éxito
        return "Encuesta creada exitosamente";
    } else {
        // Retorna un mensaje de error si no se recibieron los datos esperados
        return "Error: Datos insuficientes para crear la encuesta";
    }
});

?>
