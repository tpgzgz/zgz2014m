<?php


include_once ('suma.php');
include_once ('fibonacci.php');
include_once ('tablaMultiplicar.php');
include_once ('pintaarray.php');
include_once ('dibujamatriz.php');

$a = 4;
$b = 7;

$c = suma($a, $b);
$array = fibonacci($c);
$matrix = tablaMultiplicar($a, $b);

dibujamatriz($matrix);
pintaarray($array);