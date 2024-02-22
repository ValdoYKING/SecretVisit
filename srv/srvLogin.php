<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/dao/usuarioVerifica.php";

ejecuta(function () {
 session_start();
 $cue = trim(leeTexto("cue"));
 $match = leeTexto("match");
 $usuario = usuarioVerifica($cue, $match);
 if ($usuario === false) {
  throw new Exception("Datos incorrectos.");
 } else {
  $rolIds = [];
  foreach ($usuario->roles as $rol) {
   $rolIds[] = $rol->id;
  }
  $_SESSION[CUE] = $cue;
  $_SESSION[ROL_IDS] = $rolIds;
  return [
   CUE => $cue,
   ROL_IDS => $rolIds
  ];
 }
});
