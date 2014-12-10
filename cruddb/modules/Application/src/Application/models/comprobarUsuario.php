<?php
function comprobarUsurio($config, $name, $password)
{
    switch ($config['repository'])
    {
        case 'txt':
        case 'db':
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // SELECT * FROM users WHERE id;            	
            $sql = "SELECT iduser
			WHERE name = '".$name.", password = '".$password."'
			GROUP BY iduser;";
            // Retornar el data
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            if(count($row)==1) return $result['iduser'];
            else return false;
        break;
        case 'gd':
        break;
    }
}