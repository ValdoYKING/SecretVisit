<?php
    require_once __DIR__ . "/../lib/php/ejecuta.php";
    require_once __DIR__ . "/../lib/php/leeEntero.php";
    require_once __DIR__ . "/dao/BuscaEmpresa.php";


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (isset($data['empId']) ) {
                $id = $data['empId'];
                $modelo = BuscaEmpresa($id);
                echo json_encode($modelo);
        }
    else {
        $response = array('status' => 'error', 'message' => 'Faltan datos en la solicitud');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Se esperaba una solicitud POST');
    echo json_encode($response);
}

