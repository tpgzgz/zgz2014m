<?php

switch ($request['action']){
    
   case 'index':
       include('../modules/Application/src/Application/views/login/login.phtml');
   break;
   case 'comprobar':
       include('../modules/Application/src/Application/models/comprobarUsuario.php');
       $id = comprobarUsuario($config, $_POST['name'], $_POST['password']);
       if ($id)
       {
           session_start();
           include('../modules/Application/src/Application/models/fetchUser.php');
           $_SESSION['user'] = fetchUser($config, $id);
           header("Location: /users/insert");
       }
       else
       {
            header("Location: /error/nouser");
       }
    break;
}
