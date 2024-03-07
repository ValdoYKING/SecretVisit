<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/modelo/Encuesta.php";
require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/modelo/Empresa.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/EncuestaAgregar.php";
require_once __DIR__ . "/dao/EncuestaPreguntaAgregar.php";
require_once __DIR__ . "/const/EMPRESA.php";


ejecuta(function () {

    // Verifica si se recibieron los datos del formulario
    if (isset($_POST['empresaId'], $_POST['preguntaId'])) {
        
        // Obtiene el ID de la empresa y las preguntas seleccionadas del formulario
        // $empresaId = leeTexto("empresaId");
        $empresaId = $_POST['empresaId'];
        $preguntaIds = $_POST['preguntaId'];
        // $preguntaIds = (array)$_POST['preguntaId'];
        print_r($preguntaIds);

        // Crear un objeto Empresa con el ID recibido
        $empresa = new Empresa();
        $empresa->id = $empresaId;

        // Validar que el objeto Empresa se haya creado correctamente
        if ($empresa->id === null) {
            throw new Exception("Error: ID de empresa inválido");
        }

        print_r(" hola ");
        $usuario = new Usuario();

        // Crea una nueva encuesta
        // $encuesta = new Encuesta('Recompensa por defecto',$usuario,$empresa,0);
        $encuesta = new Encuesta($empresa,$usuario,'Recompensa por defecto',0);

                // Agrega la encuesta a la base de datos
        $encuestaId = agregarEncuesta($encuesta);
        agregarEncuesta($encuesta);
        // print_r($encuestaId);
        
        if (is_array($preguntaIds)) {
            foreach ($preguntaIds as $preguntaId) {
                $pregunta = new Pregunta();
                $pregunta->id = $preguntaId;
                $encuestaPregunta = new Encuesta_Pregunta();
                $encuestaPregunta->encuesta = $encuestaId;
                $encuestaPregunta->pregunta = $pregunta;
                agregarEncuestaPregunta($encuestaPregunta);
            }
        } else {
            throw new Exception("Error: los IDs de pregunta deben ser un array");
        }

        // Retorna un mensaje de éxito
        return "Encuesta creada exitosamente";
    } else {
        // Retorna un mensaje de error si no se recibieron los datos esperados
        return "Error: Datos insuficientes para crear la encuesta";
    }
});

?>
