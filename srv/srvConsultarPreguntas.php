<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarPregunta.php";

ejecuta(function () {
  $lista = consultarPregunta();
  $render = "";
  foreach ($lista as $it) {
    $id = htmlentities($it->id);
    $pregunta = htmlentities($it->pregunta);

  $render .= 
  "<th> $id </th>
  <td> $pregunta</td>
  <td> </td>" ; 
  }
  return $render;
});
