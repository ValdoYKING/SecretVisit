<?php
require_once __DIR__ . "/dao/eliminarEncuestaId.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['id'])) {
        $id = $data['id'];

        EliminaEncPreId($id);
        EliminaEncuestaId($id);

        return $id;
    }
}