<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";

ejecuta(function () {
 session_start();
  if (isset($_SESSION[CUE])) {
   unset($_SESSION[CUE]);
  }
  if (isset($_SESSION[ROL_IDS])) {
   unset($_SESSION[ROL_IDS]);
  }
  session_destroy();
  return [];
 });
