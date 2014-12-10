<?php

switch ($request['action']){
    
   case 'index':
       include('../modules/Application/src/Application/views/login/login.phtml');
   break;
   case 'comprobar':
       include('../modules/Application/src/Application/models/*.php');
       if (comprobarUsuario($config, $_POST['name'], $_POST['password']))
       {
           session_start();
           /**
            * TODO
            * Cargar los datos del usuario en la session
            */
           header("Location: /users/insert");
       }
       else
       {
            header("Location: /error/nouser");
       }
    break;
}
