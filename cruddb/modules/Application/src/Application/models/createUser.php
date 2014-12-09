<?php

/**
 * write2txt
 * 
 * Escribe los datos en un archivo de texto 
 * separado por pipes, y por comas los de tipo array
 * 
 * @param array $filter
 * @param string $imagename
 * @param string $filename
 * @param boolean $append 
 * @return number int number of bytes | FALSE
 */

function createUser($filter, $imagename, $config)
{
    
        switch ($config['repository'])
        {
            case 'txt':
                $filename = 'usuarios.txt';
                
                foreach($filter as $key => $value)
                {
                    if(is_array($value))
                        $value=implode(',', $value);
                    $data[$key]=$value;
                }
                $data[]=$imagename;
                $data = implode('|', $data);
                
                return file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$filename,
                    $data."\n",
                    FILE_APPEND);
            break;
            case 'db':
                // Conectarse al DBMS
                $link = mysqli_connect($config['database']['host'],
                    $config['database']['user'],
                    $config['database']['password']);
                // Seleccionar la DB
                mysqli_select_db($link, $config['database']['database']);
                // SELECT * FROM users;
                $sql = "";
                // Retornar el data
                $result = mysqli_query($link, $sql);
                
                
                return $result;
            break;
            case 'gd':
                
            break;
                
       }  
}



