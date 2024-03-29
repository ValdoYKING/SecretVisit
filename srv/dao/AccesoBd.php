<?php

require_once __DIR__ . "/../const/ROL_CLIENTE.php";
require_once __DIR__ . "/../const/ROL_ADMINISTRADOR.php";
require_once __DIR__ . "/../const/ROL_MYSTERY_SHOPPER.php";
require_once __DIR__ . "/../const/ROL_ANALISTA.php";
require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/bdCrea.php";
require_once __DIR__ . "/usuarioBuscaCue.php";
require_once __DIR__ . "/usuarioAgrega.php";
require_once __DIR__ . "/rolConsulta.php";
require_once __DIR__ . "/rolAgrega.php";
require_once __DIR__ . "/cuentaPregunta.php";
require_once __DIR__ . "/agregarPregunta.php";



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

    if(cuentaPregunta() === 0){
      agregarPregunta(
        new Pregunta(
          pregunta: "¿Qué calificacion le das al servicio de la compañia?"
          )
      );
      agregarPregunta(
        new Pregunta(
          pregunta: "¿Qué calificacion das a los precios de los productos?"
        )
      );
    }

   $usuario = usuarioBuscaCue("adminPixel");
    if (!$usuario) {
     $usuario = new Usuario(
      cue: "adminPixel",
      correo: "admin99@mail.com",
      match: "admin",
      roles: [$administrador]
     );
     usuarioAgrega($usuario);
    }

    $usuario = usuarioBuscaCue("rodolfo");
    if (!$usuario) {
     $usuario = new Usuario(
      cue: "rodolfo",
      correo: "rodolfo@mail.com",
      match: "rodolfo",
      roles: [$analista]
     );
     usuarioAgrega($usuario);
    }

   $usuario = usuarioBuscaCue("alberto");
   if (!$usuario) {
    $usuario = new Usuario(
     cue: "alberto",
     correo: "alberto@mail.com",
     match: "beto",
     roles: [$mysteryShopper]
    );
    usuarioAgrega($usuario);
   }

  }
 }
}
