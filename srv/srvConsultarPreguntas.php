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
  "<tr>
  <th> $id </th>
  <td> $pregunta</td>
  <td> <input value='$id' name='preguntasE[]'  type='checkbox'></td>
  </tr>
  " ; 
  }
  return $render;
});
