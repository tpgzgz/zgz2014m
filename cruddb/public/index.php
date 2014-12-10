<?php

$data = explode('/', $_SERVER['REQUEST_URI']);
include_once '../modules/Core/src/Router/models/parseUrl.php';
$request = parseURL($_SERVER['REQUEST_URI']);

include_once '../modules/Core/src/Module/models/moduleManager.php';
$config = moduleManager(__DIR__.'/../configs/global.php');

Session_start();

switch($request['controller'])
{
    default:
    case 'home':
        ob_start();
        include_once '../modules/Application/src/Application/controllers/home.php';
        $view=ob_get_contents();
        ob_end_clean();
        include_once '../modules/Application/src/Application/layouts/home.phtml';
    break;
    case 'login':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/login.php';   
        $view=ob_get_contents();
        ob_end_clean();
        include_once '../modules/Application/src/Application/layouts/signin.phtml';
    break;
    case 'users':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/users.php';
        $view=ob_get_contents();       
        ob_end_clean();

        include_once '../modules/Application/src/Application/layouts/dashboard.phtml';
        break;

    case 'error':
        ob_start();
            include_once '../modules/Application/src/Application/controllers/error.php';
        $view=ob_get_contents();       
        ob_end_clean();
        //include_once '../modules/Application/src/Application/layouts/dashboard.phtml';
        break;
}

