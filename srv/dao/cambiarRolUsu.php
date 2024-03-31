<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/usuarioBuscaCue.php";
require_once __DIR__ . "/obtenerRolUsuario.php";
require_once __DIR__ . "/AccesoBd.php";



function cambiarRolUsu(Usuario $usuario)  {
    

    $con = AccesoBd::getCon();
    
    $idUsu = $usuario->id;
    $usu_rol = obtenerRolUsuario($idUsu);
    if ($usu_rol === false) {
        throw new Exception("usuario no encontrada.");
    }
    $nuevo_rol_id = $usuario->roles;
    

    $stmt = $con->prepare(
        "UPDATE USU_ROL
        SET ROL_ID = :nuevo_rol_id
        WHERE USU_ID = :usu_id"
    );



// Bind de los parámetros
$stmt->bindParam(':nuevo_rol_id', $nuevo_rol_id);
$stmt->bindParam(':usu_id', $usu_id);

// Ejecutar la consulta
$stmt->execute();
}