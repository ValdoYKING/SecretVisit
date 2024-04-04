<?php

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/EncuestaPreguntaAgregar.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";
require_once __DIR__ . "/dao/BuscaPregunta.php";
require_once __DIR__ . "/dao/agregarPregunta.php";
require_once __DIR__ . "/modelo/Encuesta.php";

function agregarPreguntasEncuesta(int $idemp, array $preguntas)
{
    try{
        $encu = BuscaEncuestaidEmpresa($idemp);  
        
        if ($encu !== false) {
            $idEncuesta = $encu->id;
            echo json_encode($idEncuesta);
            foreach ($preguntas as $pregunta) {

                $idpre = $pregunta['id'];
            $preg = $pregunta['pregunta'];
            $res = $pregunta['respuesta'];
            
            $bup = BuscaPreguntabyText($preg);
            echo json_encode($bup->id);
            if (!$bup) {
                $pregunta = new Pregunta();
                $pregunta->pregunta = $preg;
                agregarPregunta($pregunta);
                $p = BuscaPreguntabyText($preg);   
                agregarEncuestaPregunta($idEncuesta ,$p->id,$res,0);
            } else {
                $pregun = BuscaPreguntabyText($preg);
                agregarEncuestaPregunta($idEncuesta ,$pregun->id,$res,0);
            } 
        } 
    } 
    } catch (Exception $e)
    {
        throw new Exception("El registro de la empresa ya esta", 1);
        
    }

}


?>
