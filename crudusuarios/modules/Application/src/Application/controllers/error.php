<?php

$validActions = array ('e404', 'e405');

switch ($request['action'])
{
    default:
    case 'e404':
        echo 'e404';        
    break;
    
    case 'e405':    
        echo 'e405';  
    break;
}