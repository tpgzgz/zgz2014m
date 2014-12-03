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


function parseURL($uri)
{
    if(isset($uri[0]))
    {
        $request['controller'] = $uri[0];    
        if(isset($uri[1]))
        {
            $request['action'] = $uri[1];
            for($i=2; i<count($uri); $i=$i+2)
            {
                $request["$uri[i]"] = $uri[i+1];
            }
        }
        else
        {
            $request['action'] = "";
        }
    }
    else
    {
        $request['request'] = "";   
    }
    return $request;
}