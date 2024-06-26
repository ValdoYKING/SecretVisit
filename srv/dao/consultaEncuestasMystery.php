<?php

require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/AccesoBd.php";

function listaEncuestaMystery() {
  $con = AccesoBd::getCon();
  $stmt = $con->query(
    "SELECT    
    E.ENC_ID as idEnc,
    E.EMP_ID as idEmp,
    E.USU_ID as idUsu,
    EM.EMP_NOMBRE as nombreEmpresa,
    COUNT(ENPR.PRE_ID) as totalPreguntas
    FROM ENCUESTA E
    JOIN EMPRESA EM ON E.EMP_ID = EM.EMP_ID
    LEFT JOIN ENC_PRE ENPR ON E.ENC_ID = ENPR.ENC_ID
    WHERE E.RESPONDIDA = 0 -- Agregamos esta condición para filtrar por RESPONDIDA igual a 0
    GROUP BY E.ENC_ID, EM.EMP_NOMBRE;"
);


  $encuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $encuesta;
}

function listaRespuestaMystery($encuestaId) {
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
      "SELECT    
      E.ENC_ID as idEnc,
      E.EMP_ID as idEmp,
      E.USU_ID as idUsu,
      EM.EMP_NOMBRE as nombreEmpresa,
      P.PRE_ID as idPregunta,
      P.PRE_PREGUNTA as pregunta
      FROM ENCUESTA E
      JOIN EMPRESA EM ON E.EMP_ID = EM.EMP_ID
      JOIN ENC_PRE ENPR ON E.ENC_ID = ENPR.ENC_ID
      JOIN PREGUNTA P ON ENPR.PRE_ID = P.PRE_ID
      WHERE E.ENC_ID = :encuestaId"
    );
  
    $stmt->bindParam(':encuestaId', $encuestaId, PDO::PARAM_INT);
    $stmt->execute();
  
    $respuestas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $respuestas;
  }  

  function listaRespuestaPreguntaEnc($encuestaId) {
    $con = AccesoBd::getCon();
    $stmt = $con->prepare(
        "SELECT    
        E.ENC_ID as idEnc,
        E.EMP_ID as idEmp,
        E.USU_ID as idUsu,
        EM.EMP_NOMBRE as nombreEmpresa,
        P.PRE_ID as idPregunta,
        P.PRE_PREGUNTA as pregunta,
        EP.ENCPRE_RESPUESTA as respuesta
        FROM ENCUESTA E
        JOIN EMPRESA EM ON E.EMP_ID = EM.EMP_ID
        JOIN ENC_PRE EP ON E.ENC_ID = EP.ENC_ID
        JOIN PREGUNTA P ON EP.PRE_ID = P.PRE_ID
        WHERE E.ENC_ID = :encuestaId"
    );

    $stmt->bindParam(':encuestaId', $encuestaId, PDO::PARAM_INT);
    $stmt->execute();

    $respuestas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $respuestas;
}

function respuestasTotalPreguntas() {
  $con = AccesoBd::getCon();
  $stmt = $con->prepare(
      "SELECT 
      PRE_ID,
      COUNT(*) as totalPreguntas,
      SUM(ENCPRE_RESPUESTA) as sumatoriaRespuestas
      FROM ENC_PRE
      GROUP BY PRE_ID"
  );

  $stmt->execute();

  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}

function mostrarEncuestasNoRespondidas($idUsuario) {
  $con = AccesoBd::getCon(); // Obtener la conexión a la base de datos
  $stmt = $con->prepare(
      "SELECT
          E.ENC_ID as idEncuesta,
          E.EMP_ID as idEmpresa,
          E.USU_ID as idUsuario,
          EM.EMP_NOMBRE as nombreEmpresa
      FROM ENCUESTA E
      JOIN EMPRESA EM ON E.EMP_ID = EM.EMP_ID
      WHERE E.USU_ID = :idUsuario
      AND NOT EXISTS (
          SELECT 1 FROM ENC_PRE
          WHERE ENC_ID = E.ENC_ID
          AND USU_ID = :idUsuario
      )"
  );

  $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
  $stmt->execute();

  $encuestasNoRespondidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $encuestasNoRespondidas;
}
