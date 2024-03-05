<?php
require_once __DIR__ . "/../modelo/Pregunta.php";


function preguntaAgregar(Pregunta $modelo)
  {
    $modelo->valida();
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
      "INSERT INTO PREGUNTAS
      (ID_PREGUNTA, PREGUNTA)
      VALUES
      (:id, :pregunta)"
    );
    $stmt->execute([
      ":id" => $modelo->id,
      ":pregunta" => $modelo->pregunta
    ]);

    $modelo->id = $con->lastInsertId();
    agregarPregunta($modelo);
    $con->commit();
  }

?>