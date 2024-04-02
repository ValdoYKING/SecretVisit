<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/const/ID_USUARIO.php"; // Agregamos la constante ID_USUARIO

ejecuta(function () {
 session_start();
 $cue = isset($_SESSION[CUE]) ? $_SESSION[CUE] : "";
 $rolIds = isset($_SESSION[ROL_IDS]) ? $_SESSION[ROL_IDS] : [];
 $idUsuario = isset($_SESSION[ID_USUARIO]) ? $_SESSION[ID_USUARIO] : "";
 return [
  CUE => $cue,
  ROL_IDS => $rolIds,
  ID_USUARIO => $idUsuario
 ];
});
?>
