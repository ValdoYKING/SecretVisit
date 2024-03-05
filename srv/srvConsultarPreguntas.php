<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/consultarPregunta.php";

ejecuta(function (){
  $lista = consultarPregunta();
  $render = "";

  foreach ($lista as $modelo) {
    $id = htmlentities($modelo->id);
    $pregunta = htmlentities($modelo->pregunta);

  $render .= 
  '<th> $id</th>
  <td> $pregunta</td>
  <td> <input type="checkbox"></td> '; 
  }

  return $render;
} );