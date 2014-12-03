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




$data = explode('/', $_SERVER['REQUEST_URI']);

echo "<pre>".$_SERVER['REQUEST_URI'];
print_r($data);
echo "</pre>";

// include_once '../modules/Core/src/Router/models/parseUrl.php';

// $request = parseURL();

$request = array ('controller'=>'users', 
              'action'=>'select'
);

switch($request['controller'])
{
    case 'users':
        include_once '../modules/Application/src/Application/controllers/users.php';
    break;
    case 'error':
        
    break;
}



