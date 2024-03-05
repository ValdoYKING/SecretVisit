<?php

require_once __DIR__ . "/../const/ROL_CLIENTE.php";
require_once __DIR__ . "/../const/ROL_ADMINISTRADOR.php";
require_once __DIR__ . "/../const/ROL_MYSTERY_SHOPPER.php";
require_once __DIR__ . "/../const/ROL_ANALISTA.php";
require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/bdCrea.php";
require_once __DIR__ . "/usuarioBuscaCue.php";
require_once __DIR__ . "/usuarioAgrega.php";
require_once __DIR__ . "/rolConsulta.php";
require_once __DIR__ . "/rolAgrega.php";

class AccesoBd
{

 private static ?PDO $con = null;

 static function getCon(): PDO
 {
  if (self::$con === null) {
   self::$con = self::conecta();
   self::prepara(self::$con);
  }
  return self::$con;
 }

 private static function conecta(): PDO
 {
  return new PDO(
   // cadena de conexión
   "sqlite:srvPixel.db",
   // usuario
   null,
   // contraseña
   null,
   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
 }

 private static function prepara(PDO $con)
 {
  bdCrea($con);
  $roles = rolConsulta();
  if (sizeof($roles) === 0) {

   $administrador = new Rol(
    id: ROL_ADMINISTRADOR,
    descripcion: "Administra el sistema."
   );
   rolAgrega($administrador);

    $mysteryShopper = new Rol(
     id: ROL_MYSTERY_SHOPPER,
     descripcion: "Evalúa la calidad de la atención."
    );
    rolAgrega($mysteryShopper);

    $analista = new Rol(
     id: ROL_ANALISTA,
     descripcion: "Evalua y crea encuestas"
    );
    rolAgrega($analista);

    $pregunta = new Pregunta(
      id: 0,
      pregunta: "¿Qué es PHP?"
    );
    preguntaAgregar($pregunta);

   $usuario = usuarioBuscaCue("adminPixel");
    if (!$usuario) {
     $usuario = new Usuario(
      cue: "adminPixel",
      match: "pikosy99*",
      roles: [$administrador]
     );
     usuarioAgrega($usuario);
    }

    $usuario = usuarioBuscaCue("rodolfo");
    if (!$usuario) {
     $usuario = new Usuario(
      cue: "rodolfo",
      match: "encuesta#2",
      roles: [$analista]
     );
     usuarioAgrega($usuario);
    }

   $usuario = usuarioBuscaCue("alberto");
   if (!$usuario) {
    $usuario = new Usuario(
     cue: "alberto",
     match: "pregutas99*",
     roles: [$mysteryShopper]
    );
    usuarioAgrega($usuario);
   }

  }
 }
}
