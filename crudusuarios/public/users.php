<?php

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";

echo "<pre>Files: ";
print_r($_FILES);
echo "</pre>";

if(isset($_GET['action']))
    $action=$_GET['action'];
else
    $action = 'select';

switch ($action)
{
    case 'insert':        
        if($_POST)
        {
            include_once '../modules/Core/src/Forms/models/validateForm.php';
            include_once '../modules/Core/src/Forms/models/filterForm.php';
            include_once '../modules/Application/src/Application/forms/userForm.php';
            include_once '../modules/Application/src/Application/models/write2txt.php';
            $filter = filterForm($userForm, $_POST);           
            $valid = validateForm($userForm, $filter);
            if($valid['valid'])
            {
                //Insertar en el repositorio
                move_uploaded_file($_FILES['photo']['tmp_name'], 
                                   $_SERVER['DOCUMENT_ROOT']."/uploads/".$_FILES['photo']['name']);                
                write2txt($filter, $_FILES['photo']['name'] ,'usuarios.txt', TRUE);               
                header("Location: /users.php?action=select");
            }            
        }   
        else
        {
            include('../modules/Application/src/Application/views/users/insert.phtml');
        }  
    break;
    case 'update':      
            // Si POST
            if($_POST)
            {
                include_once 'validateForm.php';
                include_once 'filterForm.php';
                include_once 'userForm.php';
                // Actualizar datos
                    // Recorrer el array de datos 
                        $usuarios = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
                        // Dividir por saltos de linea
                        $usuarios = explode("\n", $usuarios);
                    // Encontrar la posicion ID
                    // Reemplazar la fila por la nueva
                        $filter = filterForm($userForm, $_POST);
                        $valid = validateForm($userForm, $filter);
                        if($valid['valid'])
                        {
                            foreach($filter as $key => $value)
                            {
                                if(is_array($value))
                                    $value=implode(',', $value);
                                $data[$key]=$value;
                            }
                            $data = implode('|', $data);
                        }
                        $usuarios[$_POST['id']] = $data;
                        $usuarios = implode("\n", $usuarios);
                        // Escribir todo el array al fichero
                        file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt",
                        $usuarios);
                        // Ir al select
                        header("Location: /users.php?action=select"); 
            }
            // Si no POST
            // Cargar el formulario con datos
            else 
            {               
                $userData=fetchUser($_GET['id']); 
                $userData[0]=$_GET['id'];
                $values = hydrateUser($userData);               
                // Cargar el formulario con datos
                include('../modules/Application/src/Application/views/users/update.phtml');
            }  
    break;
    case 'select':
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
        $data = explode("\n", $data);
        include ("../modules/Application/src/Application/views/users/select.phtml");
    break;
    case 'delete':       
        if($_POST)
        {
            include_once 'validateForm.php';
            include_once 'filterForm.php';
            include_once 'userdeleteForm.php';
            // Si POST
            $filter = filterForm($userForm, $_POST);
            $valid = validateForm($userForm, $filter);
            if($valid['valid'] && $_POST['borrar']=='Si')
            {
                // Leer los datos del usuario
                // Leer todo el fichero en un string
                $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
                // Separar por saltos de linea
                $data = explode("\n", $data);
                // Localizar el usuario por ID
                // Eliminar el usuario ID del array
                unset($data[$_POST['id']]);
                // Juntarlo por saltos de linea
                $usuarios = implode("\n", $data);
                // Escribir todo el array al fichero                
                file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt",
                $usuarios);
            }
                // Ir al select
                header("Location: /users.php?action=select");            
        }        
        else 
        {
            // Leer los datos del usuario por ID
                // Leer todos los datos
                $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
                // Dividir por saltos de linea
                $data = explode("\n", $data);
                // Leer la fila ID
                $usuario = $data[$_GET['id']];                
                $usuario = explode("|", $usuario);                
                $private_key='962d52aca6a17be6185267ef085de20e4ae3fc637944a01c4ea38057dc4cc7ab';
                $values = array ('id'=>$_GET['id'],
                    'lastname'=>$usuario[1],
                    'name'=>$usuario[2],
                    'password'=>$usuario[3],
                    'email'=>$usuario[4],
                    'description'=>$usuario[5],
                    'gender'=>$usuario[6],
                    'city'=>$usuario[7],
                    'pets'=>explode(',',$usuario[8]),
                    //'languages'=>(strpos($usuario[8],',')!==FALSE)?explode(',',$usuario[8]):$usuario[8],
                    'languages'=>explode(',',$usuario[9]),
                    'photo'=>$usuario[11],
                    'token'=>hash('sha256', $_SERVER['SERVER_ADDR'].$private_key)
                );                    
                include('../modules/Application/src/Application/views/users/delete.phtml');
        }
        // SI NO POST
            // Preguntar Si/No VIA PHP
                // Via POST porque modifica la "Maquina de Estados"
    break;
}

