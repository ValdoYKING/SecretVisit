<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/consultarPregunta.php";

ejecuta(function (){
  $lista = consultarPregunta();
  $render = "";

  foreach ($lista as $modelo) {
    $id = htmlentities($modelo->id);
    $pregunta = htmlentities($modelo->pregunta);

  $ren
  }
}