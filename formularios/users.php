<?php

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
            }
            echo "<pre>Valid: ";
            print_r($valid);
            echo "</pre>";
            
        }   
        else
        {
            include_once 'userForm.php';
            include_once 'renderForm.php';
            echo renderForm($userForm, "users.php?action=insert");
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








