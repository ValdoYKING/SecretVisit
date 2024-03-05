<?php


require_once __DIR__ . "/Rol.php";

class Usuario
{

 public int $id;
 public string $cue;
 public string $match;
 /** @var Rol[] */
 public array $roles;
 public string $correo;

 public function __construct(
  string $cue = "",
  string $match = "",
  array $roles = [],
  string $correo = "",
  int $id = 0
 ) {
  $this->id = $id;
  $this->cue = $cue;
  $this->match = $match;
  $this->correo = $correo;
  $this->roles = $roles;
 }

 public function valida()
 {
  if ($this->cue === "")
   throw new Exception("Falta el cue.");
  if ($this->match === "") {
   throw new Exception("Falta el match.");
  }
  if ($this->correo === "") {
   throw new Exception("Falta el correo.");
  }
  foreach ($this->roles as $rol) {
   if (!($rol instanceof Rol))
    throw new Exception("Tipo incorrecto para un rol.");
  }
 }
}
