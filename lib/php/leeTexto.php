<?php

/**
 * Devuelve el texto de un parámetro recibido
 * en el servidor por medio de GET, POST o
 * cookie. Si el parámetro no se recibe,
 * devuelve una cadena vacía. 
 */
function leeTexto(string $parametro): string
{
 $valor = isset($_REQUEST[$parametro])
  ? $_REQUEST[$parametro]
  : "";
 return $valor;
}
