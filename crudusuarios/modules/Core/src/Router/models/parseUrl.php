<?php


/**
 * URLS validas
 *
 * /users/select/id/1/param/value/param2/value2Array
 * /users                   (controller=users, action=default)
 * /users/select            (controller=users, action=select)
 * /users/select/id/1       (controller=users, action=select)
 * /                        (controller=default, action=default)
 *
 * Invalidas (controller=error)
 * /users/select/id/1/param/value/param2    (action=405)
 * /users/select/id/1/param/                (action=405)
 * /users/select/id     (action=405)
 * /users/kaka          (action=404)
 * /kaka                (action=404)
 * /kaka/select         (action=404)
 *
 */


function parseURL($requestUri)
{
    $request = array(
        'controller'=>'',
        'action'=>'',
        'params'=>array()
        );
    
    $url = explode("/", $requestUri);
    
    foreach($url as $key => $param)
    {
        switch($param)
        {
            case '': 
                if($key != 0 && count($url) > 2)
                {
                    $request['controller'] = 'error';
                    $request['action'] = '405';
                }
            break;
            case 'users':
                if($key == 1)   
                    $request['controller'] = $param;
                else
                {
                    $request['controller'] = 'error';
                    $request['action'] = '404';
                }
            break;
            case 'select':
                if($key == 2)   
                    $request['action'] = $param;
                else
                {
                    $request['controller'] = 'error';
                    $request['action'] = '404';
                }
            break;
            default:
                echo count($url)%2;
                if($key > 2 && (count($url) % 2 != 0))
                {
                    if( $key % 2 != 0)
                        $request['params'][$param] = $url[$key +1];
                }
                else
                {
                    $request['controller'] = 'error';
                    $request['action'] = '405';
                }
                    
            break;
        }
    }
    return $request;    
}