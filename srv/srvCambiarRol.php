<?php
require_once __DIR__ . "/../lib/php/ejecuta.php";
require_once __DIR__ . "/../lib/php/leeTexto.php";
require_once __DIR__ . "/const/CUE.php";
require_once __DIR__ . "/modelo/Rol.php";
require_once __DIR__ . "/modelo/Usuario.php";
require_once __DIR__ . "/dao/usuarioBuscaCue.php";
require_once __DIR__ . "/dao/cambiarRolUsu.php"; 

// Nuevo archivo que contendrá la lógica para cambiar el rol de usuario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['id']) && isset($data['rol'])) {
        $id = $data['id'];
        $rol = $data['rol'];
/*         $response = array('status' => 
                        'success', 'message' => 'Datos recibidos correctamente'
                        ,$id, $rol
                        );
                        echo json_encode($response);*/
                        cambiarRolUsu($id, $rol);
        
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan datos en la solicitud');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
    echo json_encode($response);
}


?>
