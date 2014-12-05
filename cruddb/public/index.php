<?php

// echo "<pre>Post: ";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>Get: ";
// print_r($_GET);
// echo "</pre>";

// echo "<pre>Files: ";
// print_r($_FILES);
// echo "</pre>";


$data = explode('/', $_SERVER['REQUEST_URI']);

// echo "<pre>".$_SERVER['REQUEST_URI'];
// print_r($data);
// echo "</pre>";


include_once '../modules/Core/src/Router/models/parseUrl.php';

$request = parseURL($_SERVER['REQUEST_URI']);


include_once '../modules/Core/src/Module/models/moduleManager.php';
$config = moduleManager(__DIR__.'/../configs/global.php');

switch($request['controller'])
{
    default:
    case 'users':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/users.php';
        $view=ob_get_contents();
        ob_end_clean();
    break;
    case 'error':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/error.php';
        $view=ob_get_contents();
        ob_end_clean();
    break;
}


include_once '../modules/Application/src/Application/layouts/dashboard.phtml';

