<?php

require_once __DIR__ . "/usuarioBuscaCue.php";

function usuarioVerifica(string $cue, string $match)
{
 $usuario = usuarioBuscaCue($cue);
 if ($usuario !== false && password_verify($match, $usuario->match)) {
  return $usuario;
 } else {
  return false;
 }
}
