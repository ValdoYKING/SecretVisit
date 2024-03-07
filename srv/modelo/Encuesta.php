<?php

require_once __DIR__ . "/Empresa.php";
require_once __DIR__ . "/Usuario.php";

class Encuesta
  {
    public int $id;
    public ?Empresa $empresa;
    public ?Usuario $usuario;
    public string $recompensa;

    public function __construct(
        Empresa $empresa = null,
        ?Usuario $usuario = null,
        string $recompensa = "",
        int $id = 0
    ) {
      $this->id = $id;
      $this->empresa = $empresa;
      $this->usuario = $usuario;
      $this->recompensa = $recompensa;
    }

    public function valida()
    {

      if ($this->empresa === null)
        throw new Exception("Falta la empresa.");
      if ($this->recompensa === "")
        throw new Exception("Falta la recompensa.");
    }
  }


/** Checar */