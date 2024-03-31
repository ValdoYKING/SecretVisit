<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) && isset($data['rol'])) {
    
        $id = $data['id'];
        $rol = $data['rol'];

        $response = array('status' => 
                          'success', 'message' => 'Datos recibidos correctamente'
                         ,$id, $rol
                         );
        echo json_encode($response);
    } else {

        $response = array('status' => 'error', 'message' => 'Faltan datos en la solicitud');
        echo json_encode($response);
    }
} else {

    $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
    echo json_encode($response);
}
?>