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

function createUser($config,$filter, $imagename)
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
            
             $sql = "SELECT idUser, lastname, name, password, email, description, genders.gender, cities.city, group_concat(pets.pet SEPARATOR ','), group_concat(languages.language SEPARATOR ','), photo
             FROM users
             LEFT JOIN genders ON genders.idgender = genders_idgender
             LEFT JOIN cities ON cities.idcity = cities_idcity
             LEFT JOIN users_has_languages ON users.iduser = users_has_languages.users_iduser
             LEFT JOIN languages ON languages.idlanguage = languages_idlanguage
             LEFT JOIN users_has_pets ON users.iduser = users_has_pets.users_iduser
             LEFT JOIN pets ON pets.idpet = pets_idpet
             WHERE idUser = ". $id
             ." GROUP BY name";
            
             // Retornar el data
             $result = mysqli_query($link, $sql);
             $row = mysqli_fetch_row($result);
            
             return $row;
            
            
        break;

        case 'gd':
        break;
    
    }
    
     
}