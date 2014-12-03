<?php

/**
 * Genera una matriz con las tablas de multiplicar hasta $filas * $columnas
 * @param int $filas
 * @param int $columnas
 * @return array
 */
function tablaMultiplicar($filas, $columnas) {
    for ($y = 0; $y <= $filas; $y++) {
        for ($x = 0; $x <= $columnas; $x++) {
            $tabla[$x][$y] = ($x * $y == 0) ? $x + $y : $x * $y;
        }
    }

    return $tabla;
}