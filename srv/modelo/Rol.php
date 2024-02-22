<?php

class Rol
{

 public string $id;
 public string $descripcion;

 public function __construct(string $descripcion = "", string $id = "")
 {
  $this->id = $id;
  $this->descripcion = $descripcion;
 }

 public function valida()
 {
  if ($this->id === "")
   throw new Exception("Falta el id");
  if ($this->descripcion === "")
   throw new Exception("Faltala la descripción.");
 }
}
