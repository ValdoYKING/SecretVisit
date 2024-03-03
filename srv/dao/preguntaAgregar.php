<?php
require_once __DIR__ . "/../modelo/Pregunta.php";


function preguntaAgregar(Pregunta $modelo)
  {
    $modelo->valida();
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
    preuntaAgregar($modelo);
    $con->commit();
  }

?>