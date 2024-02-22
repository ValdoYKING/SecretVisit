<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/const/ROL_CLIENTE.php";

ejecuta(function () {
 session_start();
 $cue = isset($_SESSION[CUE])
  ? $_SESSION[CUE]
  : "";
 $rolIds = isset($_SESSION[ROL_IDS])
  ? $_SESSION[ROL_IDS]
  : [];
 if (array_search(ROL_CLIENTE, $rolIds) === false) {
  throw new Exception("No permitido.");
 }
 return "Hola " . $cue;
});
