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
            //             $sql = "UPDATE users SET
            //                                 name = '".$user['name']."',
            //                                 lastname = '".$user['lastname']."',
            //                                 password = '".$user['password']."',
            //                                 description = '".$user['description']."',
            //                                 gender = '".$user['gender']."',
            //                                 city = '".$user['city']."'
            //                                 WHERE iduser = '".$user['id'];
            //             mysqli_query($link, $sql);
            //             // destruir relaciones y
            //             // reconstruir el resto de relaciones
            //             $sql = "DELETE FROM user_has_pets WHERE iduser = " . $user['id'];
            //             mysqli_query($link, $sql);
            //             $sql = "DELETE FROM user_has_languages WHERE iduser = " . $user['id'];
            //             mysqli_query($link, $sql);            
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
