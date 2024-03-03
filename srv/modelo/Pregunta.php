<?php

class Pregunta
  {
    public int $id;
    public string $pregunta;

    public function __construct(int $id = 0, string $pregunta = "")
    {
      $this->id = $id;
      $this->pregunta = $pregunta;
    }

    public function valida()
    {
      if ($this->id === 0)
        throw new Exception("Falta el id");
      if ($this->pregunta === "")
        throw new Exception("Faltala la pregunta.");
    }
  }

?>