<?php 
    require_once __DIR__ . "/AccesoBD.php";

    function EliminaEncuestaId( int $id) {
        

        $con = AccesoBd::getCon();

        $stmt = $con->prepare(
            "DELETE 
            FROM ENCUESTA 
            WHERE ENC_ID = :encuestaId"
        );

        $stmt->execute([
            'encuestaId' => $id
        ]);
    }