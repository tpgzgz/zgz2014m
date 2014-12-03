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


include_once '../modules/Core/src/Router/models/parseUrl.php';

$request = parseURL($_SERVER['REQUEST_URI']);

echo "<pre> Request:" ;
print_r($request);
echo "</pre>";

switch($request['controller'])
{
    default:
    case 'users':
        include_once '../modules/Application/src/Application/controllers/users.php';
    break;
    case 'error':
        include_once '../modules/Application/src/Application/controllers/error.php';

    break;
}



