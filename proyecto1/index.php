<?php
//phpinfo();



// Comentario de linea

/*
 * Comentario multilinea
 * Segunda linea
 */

/**
 * Documentacion
 * @param 
 */
 

echo "Hola mundo"."\n";
echo "<br/>";
echo "Hola"."mundo \n";
echo "<br/>";

$name = "Ana";
echo "<br/>";
echo "Hola $name";
echo "<br/>";
echo "Hola".$name;
echo "<br/>";
echo 'Hola $name \n';
echo "<br/>";


echo "<hr/>";

$name = "agustin";
$edad = 10;
$tamano = 10.9;

var_dump($name);
echo "<br/>";
var_dump($edad);
echo "<br/>";
var_dump($tamano);

echo "<pre>";
print_r($tamano);
echo "</pre>";

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";


$usuario = array('name'=>'Agustin',
                 'edad'=>10,
                 'tamano'=>10.9
);

echo "<pre>";
print_r($usuario);
echo "</pre>";


echo @NAME;























    
