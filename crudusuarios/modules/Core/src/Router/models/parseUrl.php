<?php

const DEFAULT_CONTROLLER = 'users';
const DEFAULT_ACTION = 'select';
 

function parseURL()
{   
    $url = trim($_SERVER['REQUEST_URI'], '/');
    $parts = explode('/', $url, 3);
    
    if (empty($parts[0])) {
        $controller = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $params = [];
        
    } else {
        $controller = $parts[0];
        $controller_src = $_SERVER['DOCUMENT_ROOT'] . "/../modules/Application/src/Application/controllers/$controller.php";
        
        if (file_exists($controller_src)) {
            // valid controller
            ////include_once $controller_src;
            $action = isset($parts[1]) ? $parts[1] : '';
                   
            ////
            $validActions = array ('insert', 'update', 'delete', 'select');
            ////
            
            if (in_array($action, $validActions)) {
                // valid action
                $aux_params = isset($parts[2]) ? explode('/', $parts[2]) : [];
                if (count($aux_params) % 2 != 0) {
                    // wrong params
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
                $controller = 'error';
                $action = '404';
                $params = [];
            }
        
        } else {
            // controller does not exist
            $controller = "error";
            $action = "404";
            $params = [];
        }
    }
    
    
    return [
      'controller' => $controller,
      'action' => $action,
      'params' => $params  
    ];
    
    /*
    return array('controller'=>
        'action'=>
        'params'=>array(
            'param1'=>'values1',
            'param2'=>'values2',
            ...
            ...
        )
    )
    */

}