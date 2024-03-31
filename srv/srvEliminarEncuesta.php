<?php
require_once __DIR__ . "/dao/eliminarEncuestaId.php"; 

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        EliminaEncuestaId($id);
    }
