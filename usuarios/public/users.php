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
        echo "Esto es el Insert";         
        if($_POST)
        {
            include_once 'validateForm.php';
            include_once 'filterForm.php';
            include_once 'userForm.php';
            $filter = filterForm($userForm, $_POST);
            echo "<pre>Filter: ";
            print_r($filter);
            echo "</pre>";
            
            $valid = validateForm($userForm, $filter);
            if($valid['valid'])
            {
                //Insertar en el repositorio
                move_uploaded_file($_FILES['photo']['tmp_name'], 
                                   $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
                
                foreach($filter as $key => $value)
                {
                    if(is_array($value))
                        $value=implode(',', $value);
                    $data[$key]=$value;
                }
                $data[]=$_FILES['photo']['name'];
                $data = implode('|', $data);
                
                file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt", 
                                  $data."\n", 
                                  FILE_APPEND);
                
                header("Location: /users.php?action=select");
            }
            echo "<pre>Valid: ";
            print_r($valid);
            echo "</pre>";
            
        }   
        else
        {
            include_once 'userForm.php';
            include_once 'renderForm.php';
            echo renderForm($userForm, 
                            "users.php?action=insert",
                            null,
                            'post', 
                            TRUE);
        }  
    break;
    case 'update':
        echo "Esto es el Update";
       
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
                    
                        
                        echo "<pre>Usuarios: ";
                        print_r($usuarios);
                        echo "</pre>";
                        
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
                // Leer los datos del usuario por ID
                // Leer todos los datos
                $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
                // Dividir por saltos de linea
                $data = explode("\n", $data);
                // Leer la fila ID
                $usuario = $data[$_GET['id']];
                
                $usuario = explode("|", $usuario);
                
                
                echo "<pre>Usuario: ";
                print_r($usuario);
                echo "</pre>";
                
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
                    'photo'=>$usuario[11]);
                
                echo "<pre>Values: ";
                print_r($values);
                echo "</pre>";
                // Cargar el formulario con datos
                include_once 'userForm.php';
                include_once 'renderForm.php';
                echo renderForm($userForm,
                    "users.php?action=update",
                    $values,
                    'post',
                    TRUE);
            }        
       
        
    break;
    case 'select':
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
        $data = explode("\n", $data);
        echo "<a href=\"users.php?action=insert\">Insert</a>";
        
        echo "<table border=1>";
        foreach ($data as $key => $fila)
        {
            echo "<tr>";
            $columna = explode("|", $fila);
            foreach ($columna as $value)
            {
                echo "<td>".$value."</td>";
            } 
            
            echo "<td>";
            echo "<a href=\"users.php?action=update&id=".$key."\">Update</a> | ";
            echo "<a href=\"users.php?action=delete&id=".$key."\">Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    break;
    case 'delete':
        echo "Esto es el Delete";
        
        // Si POST
            // Leer los datos del usuario
                // Leer todo el fichero en un string
                // Separar por saltos de linea
            // Localizar el usuario por ID
            // Eliminar el usuario ID del array
            // Escribir el array al fichero de texto
                // Juntarlo por saltos de linea
                // Escribir el string en el fichero    
        
        // SI NO POST
            // Preguntar Si/No VIA PHP
                // Via POST porque modifica la "Maquina de Estados"
    break;
}








