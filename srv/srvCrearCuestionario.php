<?php

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/dao/enc_preAgregar.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";
require_once __DIR__ . "/dao/cuentaEncuesta.php";
require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/../lib/php/leeEntero.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/agregarEncuesta.php";
require_once __DIR__ . "/dao/usuarioBuscaCue.php";


ejecuta(function ()
{
    $idempresa = leeEntero("");;
    $cue = $_POST['cue'];
    $idpreguntas[] = ("preguntasE");  
        $idemp = new Empresa(id: $idempresa);
        $idcue = new Usuario(id: $cue );
        $encuestaN = new Encuesta("",$idcue,$idemp,0);
        agregarEncuesta($encuestaN);
    foreach($idpreguntas as $idp){
        $preguntaid = leeEntero($idp);
        if(cuentaEncuesta() === 0){
            $idEncuesta = 1;
        }
        $idEncuesta = leeEntero(obtenerUltimoIdEncuesta());
        $encuesta = new Encuesta(id: $idEncuesta);
        $pregunta = new Pregunta(id: $preguntaid);
        $nuevaencpre = new Encuesta_Pregunta("",$pregunta, $encuesta);
        enc_preAgregar($nuevaencpre);
    }
    // crea un nuevo objeto Usuario con los datos del formulario


    // Agrega el usuario a la base de datos



    $nuevaencpre->encuesta->id = [];
    return $nuevaencpre;
});
