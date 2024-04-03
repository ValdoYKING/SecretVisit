<?php
/* 

require_once __DIR__ . "/modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/dao/enc_preAgregar.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";
require_once __DIR__ . "/dao/cuentaEncuesta.php";
require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/../lib/php/leeEntero.php";
require_once __DIR__ . "/modelo/Pregunta.php";
require_once __DIR__ . "/dao/agregarEncuesta.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if ($data !== null) {
        $response = agregarEncuesta($data);
        if ($response !== null) {
            echo json_encode($response);
        } else {
            $response = ['success' => false, 'message' => 'Error al agregar la encuesta'];
            echo json_encode($response);
        }
       
    } else {
       
        $response = ['success' => false, 'message' => 'Error al decodificar el JSON'];
        echo json_encode($response);
    }
} else {
   
    $response = ['success' => false, 'message' => 'Se esperaba una solicitud POST'];
    echo json_encode($response);
}
require_once __DIR__ . "/dao/usuarioBuscaCue.php";
require_once __DIR__ . "/agregarPreguntasEncuesta.php";



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['data']) ) {
            $datos = $data['data'];
            $idemp = $datos['empresa'];
            $idusu = $datos['idusu'];
            $preguntas = $datos['preguntas'];
            $idsPreguntas = array();
// Itera sobre el arreglo de preguntas y extrae los IDs
            foreach ($preguntas as $pregunta) {
            $idsPreguntas[] = $pregunta['id'];
            }
            agregarEncuesta($idemp,$idusu,"Recompsensa por defecto");
            echo json_encode($idsPreguntas);  
            agregarPreguntasEncuesta($idemp, $idsPreguntas, $idusu);     
        } else {
           
        }
    } else {    
        $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
        echo json_encode($response);
    }
   /*  $idempresa = leeEntero("");
    $cue = $_POST['cue'];
    $idpreguntas[] = ("preguntasE");  
        $encuestaN = new Encuesta($idcue,$idemp,"",0);
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
    } */
    // crea un nuevo objeto Usuario con los datos del formulario


    // Agrega el usuario a la base de datos



    //$nuevaencpre->encuesta->id = [];
    return $datos;

