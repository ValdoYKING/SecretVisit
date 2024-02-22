<?php

/**
 * Ejecuta una funcion que implementa un servicio.
 */
function ejecuta($servicio)
{
 try {
  // Usa utf8.
  mb_internal_encoding("UTF-8");
  $resultado = $servicio();
  // Devuelve JSON.
  header("Content-Type: application/json");
  $json = json_encode($resultado);
  if ($json === false)
   throw new Exception("El valor de regreso no puede representarse como JSON");
  echo $json;
 } catch (Throwable $t) {
  // Devuelve error.
  header("Content-Type: text/plain");
  http_response_code(500);
  echo $t->getMessage();
 }
}
