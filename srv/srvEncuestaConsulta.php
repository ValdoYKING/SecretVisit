<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeEntero.php";
require_once __DIR__ . "/dao/consultarEnc_Pre.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";

ejecuta(function () {

    $idempre = leeEntero("empid");
    $encuestaM = BuscaEncuestaidEmpresa($idempre);
    $encID = $encuestaM->id;
    $modelos = consultarEnc_Pre($encID);// Obtener todos los modelos
    if ($modelos === false || empty($modelos))
    throw new Exception("no encontro encuesta");

    $render = "";

    // Obtener el nombre de la empresa solo una vez
    $empresaNombre = $modelos[0]->encuesta->empresa->nombre;
    if(!empty($empresaNombre)){
        $empresaNombreHtml = htmlentities($empresaNombre);
        $render .= "<div><h2>Empresa: $empresaNombreHtml</h2></div>";
    
        foreach ($modelos as $encuesta_pregunta) {
            $pregunta = $encuesta_pregunta->pregunta;
            $encuesta = $encuesta_pregunta->encuesta;
    
            //$preguntaId = htmlentities($pregunta->id);
            $preguntaTexto = htmlentities($pregunta->pregunta);
            $encuestaId = htmlentities($encuesta->id);
            $render .= 
            "<div>
                <label> $preguntaTexto</label>
                <input type='range' min='0' max='5' name='respuestas' value='4'>
                <input type='hidden' name='preguntaId' value='$encuestaId'>
            </div>";
        }
        return $render;

    } elseif (empty($empresaNombre)) {
        return $render = "";
        # code...
    }       

});