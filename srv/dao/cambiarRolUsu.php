<?php

require_once __DIR__ . "/../modelo/Usuario.php";
require_once __DIR__ . "/../modelo/Rol.php";
require_once __DIR__ . "/usuarioBuscaCue.php";
require_once __DIR__ . "/obtenerRolUsuario.php";
require_once __DIR__ . "/AccesoBd.php";



function cambiarRolUsu(int $id, String $rol)  {
    

    $con = AccesoBd::getCon();
    
    
    $usu_rol = obtenerRolUsuario($id);
    if ($usu_rol === false) {
        throw new Exception("usuario no encontrada.");
    }
    
    $nuevo_rol_id = $rol;

    $stmt = $con->prepare(
        "UPDATE USU_ROL
        SET ROL_ID = :nuevo_rol_id
        WHERE USU_ID = :usu_id"
    );



// Bind de los parámetros
$stmt->bindParam(':usu_id', $id);
$stmt->bindParam(':nuevo_rol_id', $nuevo_rol_id);

// Ejecutar la consulta
$stmt->execute();
}