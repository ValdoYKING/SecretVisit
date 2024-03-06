<?php
class Pregunta
  {
    public int $id;
    public string $pregunta;

    public function __construct(
      string $pregunta = "",
      int $id = 0
    ) {
      $this->id = $id;
      $this->pregunta = $pregunta;
    }

    public function valida()
    {
      if ($this->pregunta === "")
        throw new Exception("Falta la pregunta.");
    }
  }

?>