<?php
namespace Core\Router;

use Core\Application\Application;
class parseURL
{


    //const DEFAULT_CONTROLLER = 'home';
    //const DEFAULT_ACTION = 'select';
    
    /* Esta funcion devuelve un array con el controlador, la accion y los parametros
     segun la url. Dependiendo del controlador introducido en la url, se incluye un archivo
     u otro de los controllers
     */
    public static function parseURL()
    {   
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $parts = explode('/', $url, 3);
    
        if (empty($parts[0])) {
            $controller = Application::getConfig()['default_controller'];
            $action = Application::getConfig()['default_action'];
            $params = [];            
        } else {
            $controller = $parts[0];
            // Si hay algo en la url ademas del dominio se llama al archivo 
            // pasado en el primer valor del array que corresponde con el controlador
            $controller_src = $_SERVER['DOCUMENT_ROOT'] 
                    . "/../modules/Application/src/Application/controllers/$controller.php";
            
            if (file_exists($controller_src)) {
                // Si en el array hay un valor en la segunda clave, se asigna a la variable
                $action = isset($parts[1]) ? $parts[1] : '';
                   
    
                $validActions = array ('insert', 'update', 'delete', 'select', 'index', 'logout');
    
                // Si la accion es un valor valido...
                if (in_array($action, $validActions)) {
                    // Si ademas se han pasado parametros en la url se asignan a una variable
                    $aux_params = isset($parts[2]) ? explode('/', $parts[2]) : [];
                    if (count($aux_params) % 2 != 0) {
                        // wrong params
                        header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed");
                        $controller = 'error';
                        $action = '405';
                        $params = [];
                    } else {
                        $params = [];
                        for ($i = 0, $l = count($aux_params); $i < $l; $i += 2) {
                            $params[$aux_params[$i]] = $aux_params[$i+1];
                        }
                    }
                    
                } else {
                    // invalid action
                    header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
                    $controller = 'error';
                    $action = '400';
                    $params = [];
                }
            
            } else {
                // controller does not exist
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
                $controller = "error";
                $action = "404";
                $params = [];
            }
        }
        
        // Retorna un Request
        return [
          'controller' => $controller,
          'action' => $action,
          'params' => $params  
        ];
        
    }
    
}