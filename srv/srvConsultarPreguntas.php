<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarPregunta.php";

ejecuta(function (){
  $lista = consultarPregunta();
  $render = "";

  foreach ($lista as $modelo) {
    $id = htmlentities($modelo->PRE_ID);
    $pregunta = htmlentities($modelo->PRE_PREGUNTA);

  $render .= 
  '<th> $id</th>
  <td> $pregunta</td>
  <td> <input type="checkbox"></td>' ; 
  }

  return $render;
} );