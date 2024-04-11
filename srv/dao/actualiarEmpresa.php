<?php

require_once __DIR__ . "/../modelo/Empresa.php"; // Suponiendo que Empresa.php contiene la definición de la clase Empresa
require_once __DIR__ . "/AccesoBd.php";

function actualizarEmpresa(int $empId, string $nombre, string $direccion, string $telefono)
{
    try {
        $con = AccesoBd::getCon();
        
        // Preparar la consulta SQL de actualización
        $stmt = $con->prepare("UPDATE EMPRESA SET EMP_NOMBRE = ?, EMP_DIRECCION = ?, EMP_TELEFONO = ? WHERE EMP_ID = ?");

        // Vincular los parámetros
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $direccion, PDO::PARAM_STR);
        $stmt->bindParam(3, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(4, $empId, PDO::PARAM_STR);


        // Ejecutar la consulta de actualización
        $stmt->execute();

        // Retornar true si la actualización fue exitosa
        return true;
    } catch (Exception $e) {
        throw new Exception("Error al actualizar la empresa: " . $e->getMessage());
    }
}
