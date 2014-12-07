<?php

/**
 * Fetch user by id
 * @param int $id
 * @param array $config
 * @return array $user
 */
function fetchUser($id,$config)
{
    switch ($config['repository'])
    {
        case 'txt':
            // Leer los datos del usuario por ID
            // Leer todos los datos
            $user = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
            // Dividir por saltos de linea
            $user = explode("\n", $user);
            // Leer la fila ID
            $user = $user[$id];
            $user = explode("|", $user);
          
            return $user;
            break;
        case 'db':
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'],
                $config['database']['user'],
                $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // Seleccionar el usuario
            $sql = "SELECT * FROM users WHERE iduser = " . $id;
            $user = mysqli_query($link, $sql);
            return mysqli_fetch_assoc($user);
            break;
    }
}
