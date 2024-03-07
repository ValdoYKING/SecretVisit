<?php

require_once __DIR__ . "/leeTexto.php";

/**
 * Devuelve el valor entero de un parámetro
 * recibido en el servidor por medio de GET,
 * POST o cookie. Si parámetro no se puede
 * convertir a entero, se genera un error.
 * Si el parámetro no se recibe, devuelve
 * null.
 */
function leeEntero(string $parametro): ?int
{
 $valor = trim(leeTexto($parametro));
 return $valor === ""
  ? null
  : $valor;
}
