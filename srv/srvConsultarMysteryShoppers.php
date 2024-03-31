<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultaMysterys.php";

ejecuta(function () {
    $lista = consultarMystery();
   
  return $lista;
});
