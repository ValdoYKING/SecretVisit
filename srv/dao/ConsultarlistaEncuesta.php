<?php

require_once __DIR__ . "/../../lib/php/recibeFetchAll.php";
require_once __DIR__ . "/../modelo/Encuesta.php";
require_once __DIR__ . "/../modelo/Encuesta_Pregunta.php";
require_once __DIR__ . "/../modelo/Pregunta.php";
require_once __DIR__ . "/AccesoBd.php";

function consultarlistaEncuesta(Encuesta $encuesta)
{
 $con = AccesoBd::getCon();
 $stmt = $con->query(
  "SELECT
    EP.ID AS encpreId,
    P.PRE_PREGUNTA AS pregunta,
    P.PROD_EXISTENCIAS AS prodExistencias,
    P.PROD_PRECIO AS prodPrecio,
    DV.DTV_CANTIDAD AS cantidad,
    DV.DTV_PRECIO AS precio
   FROM ENC_PRE EP, PREGUNTA P
   WHERE
    EP.ID = P.PRE_ID
    AND EP.ID = :encuId;
   ORDER BY P.PRE_ID"
 );
 $stmt->execute([":encuId" => $encuesta->id]);
 $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
 $objs = recibeFetchAll($resultado);
 /** @var Encpre[] */
 $detalles = [];
 foreach ($objs as $obj) {
    $respuesta = 0;
  $pregunta = new Pregunta(
   id: $obj->pre_id,
   pregunta: $obj->pre_pregunta
  );
  $detalle = new Encuesta_Pregunta(
   respuesta: $respuesta,
   pregunta: $obj->pre_id,
   encuesta: $obj->pre_pregunta
  );
  $detalles[] = $detalle;
 }
 return $detalles;
}
