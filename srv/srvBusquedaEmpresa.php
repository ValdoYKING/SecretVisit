<?php
    require_once __DIR__ . "/../lib/php/ejecuta.php";
    require_once __DIR__ . "/../lib/php/leeEntero.php";
    require_once __DIR__ . "/dao/BuscaEmpresa.php";


    ejecuta( function(){
        $id = leeEntero("empId");
        $modelo = BuscaEmpresa($id);
        if($modelo === false) {
            throw new Exception("Empresa no encontrada");
        } else {
            return [
                "id" => $modelo->id,
                "nombre" => $modelo->nombre,
                "direccion" => $modelo->direccion,
                "telefono" => $modelo->telefono
            ];
        }
    });
