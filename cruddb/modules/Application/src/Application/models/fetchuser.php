<?php

/**
 * Fetch user by id
 * @param int $id
 * @param $config
 * @return array
 */
function fetchUser($id, $config)
{
    switch ($config['repository'])
    {
        case 'txt':
            // Leer los datos del usuario por ID
            // Leer todos los datos
            $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
            // Dividir por saltos de linea
            $data = explode("\n", $data);
            // Leer la fila ID
            $usuario = $data[$id];
            $usuario = explode("|", $usuario);
            
            return $usuario;
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