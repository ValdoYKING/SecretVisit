<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";

ejecuta(function () {
  $lista = consultarEmpresa();
  $render = "";
  foreach ($lista as $it) {
    $id = htmlentities($it->id);
    $nombre = htmlentities($it->nombre);
    $direccion = htmlentities($it->direccion);
    $telefono = htmlentities($it->telefono);
    $calificacion = htmlentities($it->calificacion);
    $empresa = BuscaEncuestaidEmpresa($id);
    $render .= 
    "<div class='card' style='width: 18rem;'>
    <div class='card-body'>
      <h5 class='card-title'> $nombre </h5>
      <p class='card-text'>$telefono</p>
      <a class='btn btn-primary'> $direccion</a>
      <div> $calificacion</div>"; 
      if($empresa){
      $render .=  "<a href='FormEncuesta.html?empid=$id'> Ver cuestionario</a>";
      } else {
      $render .= "<a href='crearEncuesta.html?empId=$id&?cue=rodolfo'>Crear Cuestionario</a>";
      }
    $render .= "  
    </div>
  </div>
    "; 
    }
    return $render;
});