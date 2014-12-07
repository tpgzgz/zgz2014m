<?php
/**
 * Update data of an user
 *
 * @param array $filter
 * @param array $config
 * @param userForm $user
 * @return nothing just change data on repository
 */

function updateUser($filter, $config, $user)
{
    switch ($config['repository'])
    {
        case 'txt':
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
            break;
        case 'db':
            
            break;
    }
}
