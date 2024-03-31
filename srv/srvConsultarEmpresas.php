<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/dao/consultarEmpresas.php";

ejecuta(function () {
    $lista = consultarEmpresas();
  return $lista;
});
