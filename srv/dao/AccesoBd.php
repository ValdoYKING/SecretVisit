<?php

require_once __DIR__ . "/../const/ROL_CLIENTE.php";
require_once __DIR__ . "/../const/ROL_ADMINISTRADOR.php";
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
   "sqlite:srvaut.db",
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

   $cliente = new Rol(
    id: ROL_CLIENTE,
    descripcion: "Realiza compras."
   );
   rolAgrega($cliente);

    $pregunta = new Pregunta(
      id: 0,
      pregunta: "¿Qué es PHP?"
    ):
      preuntaAgregar($con, $pregunta);

   $usuario = usuarioBuscaCue("pepito");
   if (!$usuario) {
    $usuario = new Usuario(
     cue: "pepito",
     match: "cuentos",
     roles: [$cliente]
    );
    usuarioAgrega($usuario);
   }

   $usuario = usuarioBuscaCue("susana");
   if (!$usuario) {
    $usuario = new Usuario(
     cue: "susana",
     match: "alegria",
     roles: [$administrador]
    );
    usuarioAgrega($usuario);
   }

   $usuario = usuarioBuscaCue("bebe");
   if (!$usuario) {
    $usuario = new Usuario(
     cue: "bebe",
     match: "saurio",
     roles: [$administrador, $cliente]
    );
    usuarioAgrega($usuario);
   }
  }
 }
}
