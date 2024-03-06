<?php
class Empresa
  {
    public int $id;
    public string $nombre;
    public string $direccion;
    public string $telefono;
    public int $calificacion;

    public function __construct(
      int $calificacion = 0,
        string $nombre = "",
      string $direccion = "",
      string $telefono = "",
      int $id = 0
    ) {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->direccion = $direccion;
      $this->telefono = $telefono;
      $this->calificacion = $calificacion;
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