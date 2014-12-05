<?php

function fetchAllUser($config)
{
    switch ($config['repository'])
    {
        case 'txt':
            $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
            $data = explode("\n", $data);
            return $data;
        break;
        case 'db':
            echo "<pre>";
            print_r($config);
            echo "</pre>";
            // Conectarse al DBMS
            // Seleccionar la DB
            // SELECT * FROM users;
            // Retornar el data
        break;
        case 'gd':
        break;
        
    }
   
}