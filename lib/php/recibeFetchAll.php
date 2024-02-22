<?php

function recibeFetchAll(false|array $resultado): array
{
 if ($resultado === false) {
  return [];
 } else {
  return $resultado;
 }
}
