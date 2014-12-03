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
            }
            echo "<pre>Valid: ";
            print_r($valid);
            echo "</pre>";
            
        }   
        else
        {
            include_once 'userForm.php';
            include_once 'renderForm.php';
            echo renderForm($userForm, "users.php?action=insert",'post', TRUE);
        }  
    break;
    case 'update':
        echo "Esto es el Update";
    break;
    case 'select':
        echo "Esto es el Select";
    break;
    case 'delete':
        echo "Esto es el Delete";
    break;
}








