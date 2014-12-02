<?php

function hydrateUser($usuario)
{
    $values = array ('id'=>$usuario[0],
        'lastname'=>$usuario[1],
        'name'=>$usuario[2],
        'password'=>$usuario[3],
        'email'=>$usuario[4],
        'description'=>$usuario[5],
        'gender'=>$usuario[6],
        'city'=>$usuario[7],
        'pets'=>explode(',',$usuario[8]),
        //'languages'=>(strpos($usuario[8],',')!==FALSE)?explode(',',$usuario[8]):$usuario[8],
        'languages'=>explode(',',$usuario[9]),
        'photo'=>$usuario[11]);
    
    return $values;
}