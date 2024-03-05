<?php

class Preguntas
{

 public string $id;
 public string $pregunta;

 public function __construct(string $pregunta = "", string $id = "")
 {
  $this->id = $id;
  $this->pregunta = $pregunta;
 }

 public function valida()
 {
  if ($this->id === "")
   throw new Exception("Falta el id");
  if ($this->pregunta === "")
   throw new Exception("Falta la pregunta.");
 }
}
