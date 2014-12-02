<?php


function updateUser($filter)
{
    $filename = 'usuarios.txt';
    // Recorrer el array de datos
    $usuarios = file_get_contents($_SERVER['DOCUMENT_ROOT']."/".$filename);
    // Dividir por saltos de linea
    $usuarios = explode("\n", $usuarios);
    foreach($filter as $key => $value)
    {
        if(is_array($value))
            $value=implode(',', $value);
        $data[$key]=$value;
    }
    $data = implode('|', $data);
    
    $usuarios[$filter['id']] = $data;
    $usuarios = implode("\n", $usuarios);
    // Escribir todo el array al fichero
    return file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt",
    $usuarios);
     
}