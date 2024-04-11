<?php 
    require_once __DIR__ . "/AccesoBD.php";

    function EliminaEncuestaId(int $id) {
        $con = AccesoBd::getCon();

        $stmt = $con->prepare(
            "DELETE 
            FROM ENCUESTA 
            WHERE EMP_ID = :encuestaId"
        );

        $stmt->execute([
            'encuestaId' => $id
        ]);
    }

    function EliminaEmpresaId(int $id) {
        
        $con = AccesoBd::getCon();

        $stmt = $con->prepare(
            'DELETE FROM EMPRESA 
            WHERE EMP_ID = :id'
        );

        $stmt->execute([
            'id' => $id
        ]);
    }

    function EliminaEncPreId(int $id) {
        $con = AccesoBd::getCon();

        $stmt = $con->prepare(
            'DELETE FROM ENC_PRE 
            WHERE ENC_ID IN (SELECT ENC_ID FROM ENCUESTA WHERE EMP_ID = :id)'
        );

        $stmt->execute([
            'id' => $id
        ]);
    }