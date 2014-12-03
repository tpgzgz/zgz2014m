<?php



echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";


echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";

// echo "<pre>SERVER: ";
// print_r($_SERVER);
// echo "</pre>";

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

                echo "<img width=\"100px\" src=\"".$values['photo']."\"/>";
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
                echo "<pre>Data: ";
                print_r($data);
                echo "</pre>";
                
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
            
            
            
            // Escribir el string en el fichero
            
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
                
                
                echo "<pre>Usuario: ";
                print_r($usuario);
                echo "</pre>";
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
                    
                
                echo "<pre>Values: ";
                print_r($values);
                echo "</pre>";
                

                include_once 'userdeleteForm.php';
                include_once 'renderForm.php';
                echo renderForm($userdeleteForm,
                "http://usuarios.local/users.php?action=delete",
                $values,
                'post');

        }
        // SI NO POST
            // Preguntar Si/No VIA PHP
                // Via POST porque modifica la "Maquina de Estados"
    break;
}








