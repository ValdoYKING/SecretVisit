<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresa.php";
require_once __DIR__ . "/dao/BuscaEncuesta.php";

ejecuta(function () {
  $lista = listaEncuesta();
   return $lista;
});