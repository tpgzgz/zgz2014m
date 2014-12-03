<?php

/**
 * Fetch user by id
 * @param int $id
 * @return array
 */
function fetchUser($id)
{
    // Leer los datos del usuario por ID
    // Leer todos los datos
    $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
    // Dividir por saltos de linea
    $data = explode("\n", $data);
    // Leer la fila ID
    $usuario = $data[$id];
    $usuario = explode("|", $usuario);
    
    return $usuario;
}