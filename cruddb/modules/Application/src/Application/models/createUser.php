<?php

/**
 * write2txt
 * 
 * Escribe los datos en un archivo de texto 
 * separado por pipes, y por comas los de tipo array
 * 
 * @param array $filter
 * @param string $imagename
 * @param array $config
 * @param userForm $user
 * @return number int number of bytes | FALSE
 */

function createUser($filter, $imagename, $config, $user)
{
    switch ($config['repository'])
    {
        case 'txt';
            $filename = 'usuarios.txt';
            
            foreach($filter as $key => $value)
            {
                if(is_array($value))
                    $value=implode(',', $value);
                $data[$key]=$value;
            }
            $data[]=$imagename;
            $data = implode('|', $data);
            return file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$filename, $data."\n",FILE_APPEND);
            break;
        case 'db':
//             // Conectarse al DBMS
//             $link = mysqli_connect($config['database']['host'],
//                 $config['database']['user'],
//                 $config['database']['password']);
//             // Seleccionar la DB
//             mysqli_select_db($link, $config['database']['database']);
//             //selecciona el id de ciudad
//             $sql = "SELECT idcity FROM cities JOIN users WHERE city ='".$user['city']."'";
//             $user['city'] = mysqli_query($link, $sql);
            
//             $sql = "SELECT idgender FROM genders JOIN users WHERE gender ='".$user['gender']."'";
//             $user['gender'] = mysqli_query($link, $sql);
//             // crear el usuario el usuario
//             $sql = "Insert INTO users SET
//                                 id = '".$user['id']."',
//                                 name = '".$user['name']."',
//                                 lastname = '".$user['lastname']."',
//                                 password = '".$user['password']."',
//                                 description = '".$user['description']."',
//                                 gender = '".$user['gender']."',
//                                 city = '".$user['city']."'";
//             mysqli_query($link, $sql);
//             // crear el resto de relaciones
//             foreach($user['pet'] as $pet)
//             {
//                 $sql = "SELECT idpet FROM pets JOIN users WHERE pet ='".$pet."'";
//                 $pet = mysqli_query($link, $sql);
//                 $sql = "INSERT INTO user_has_pet SET
//                                 idpet = '".$pet."',
//                                 iduser = '".$user['id']."'";
//                 mysqli_query($link, $sql);
//             }
//             foreach($user['language'] as $lang)
//             {
//                 $sql = "SELECT idlanguage FROM languages JOIN users WHERE language ='".$lang."'";
//                 $lang = mysqli_query($link, $sql);
//                 $sql = "INSERT INTO user_has_pet SET
//                                 idpet = '".$lang."',
//                                 iduser = '".$user['id']."'";
//                 mysqli_query($link, $sql);
//             }
            break;
    }
}
