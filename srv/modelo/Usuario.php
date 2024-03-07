<?php


require_once __DIR__ . "/Rol.php";

class Usuario
{

 public int $id;
 public string $cue;
 public string $correo;
 public string $match;
 /** @var Rol[] */
 public array $roles;

 public function __construct(
  string $cue = "",
  string $correo = "",
  string $match = "",
  array $roles = [],
  int $id = 0
 ) {
  $this->id = $id;
  $this->cue = $cue;
  $this->correo = $correo;
  $this->match = $match;
  $this->roles = $roles;
 }

 public function valida()
 {
  if ($this->cue === "")
   throw new Exception("Falta el cue.");
    if ($this->correo === "") {
   throw new Exception("Falta el correo.");
  }
  if ($this->match === "") {
   throw new Exception("Falta el match.");
  }
  foreach ($this->roles as $rol) {
   if (!($rol instanceof Rol))
    throw new Exception("Tipo incorrecto para un rol.");
  }
 }
}
