<?php
require_once __DIR__ . '/dao/ObtenerEmpresasPorId.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) ) {
    
        $id = $data['id'];
     

        $response = ObtenerEmpresasPorId($id);
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