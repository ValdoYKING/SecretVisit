<?php

require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/const/ROL_IDS.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/const/IDUSU.php";
require_once __DIR__ . "/dao/usuarioVerifica.php";
require_once __DIR__ . "/dao/obtenerRolUsuario.php";

ejecuta(function () {
    session_start();
    $cue = trim(leeTexto("cue"));
    $match = leeTexto("match");
    $usuario = usuarioVerifica($cue, $match);
    if ($usuario === false) {
        /* throw new Exception("Datos incorrectos."); */
        header("Location: ../login.html?error=Datos incorrectos.");
        exit();
    } else {
        $rolIds = [];
        foreach ($usuario->roles as $rol) {
            $rolIds[] = $rol->id;
        }
        $_SESSION[CUE] = $cue;
        $_SESSION[ROL_IDS] = $rolIds;
        $_SESSION[IDUSU] = $usuario->id;


        $rol = obtenerRolUsuario($usuario->id); 
        if ($rol === "Administrador") {
            header("Location: ../admin.html");
            exit(); 
        } elseif ($rol === "Analista") {
            header("Location: ../analista.html");
            exit();
        } elseif ($rol === "Mystery Shopper") {
            header("Location: ../mystery-shopper.html");
            exit();
        } else {
            header("Location: ../index.html");
            exit();
        }
    }
});
