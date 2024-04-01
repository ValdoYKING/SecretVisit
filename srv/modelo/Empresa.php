<?php
class Empresa
  {
    public int $id;
    public string $nombre;
    public string $direccion;
    public string $telefono;
    public int $calificacion;
    public ?Usuario $usuario;
    public int $encuesta;

    public function __construct(
      int $calificacion = 0,
        string $nombre = "",
      string $direccion = "",
      string $telefono = "",
      ?Usuario $usuario = null,
      int $encuesta = 0,
      int $id = 0
    ) {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->direccion = $direccion;
      $this->telefono = $telefono;
      $this->calificacion = $calificacion;
      $this->usuario = $usuario;
      $this->encuesta = $encuesta;
    }

    public function valida()
    {
      if ($this->nombre === "")
        throw new Exception("Falta la nombre.");
        if ($this->direccion === "")
        throw new Exception("Falta la direccion.");
        if ($this->telefono === "")
        throw new Exception("Falta la Telefono.");
    }
  }

?>