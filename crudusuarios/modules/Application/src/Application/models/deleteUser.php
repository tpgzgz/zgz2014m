<?php

/**
 * Deelte user by id
 * 
 * @param int $id
 * @return number or FALSE
 */

function deleteUser($id)
{
    $filename = 'usuarios.txt';
    
    // Leer los datos del usuario
    // Leer todo el fichero en un string
    $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
    // Separar por saltos de linea
    $data = explode("\n", $data);
    // Localizar el usuario por ID
    // Eliminar el usuario ID del array
    unset($data[$id]);
    // Juntarlo por saltos de linea
    $usuarios = implode("\n", $data);
    // Escribir todo el array al fichero
    return file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt",
    $usuarios);
}