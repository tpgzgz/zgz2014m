<?php
/**
 * Send controller/action like authentication/login or whatever named
 * 
 * @param array $request using $request['action']
 * 
 */
switch ($request['action'])
{
    default:
    case 'select':
        
    break;
    case 'login':
        // Send to authentication controller with login action
        header("Location: /authentication/login");
    break;
}
