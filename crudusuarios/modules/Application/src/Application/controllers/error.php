<?php

switch ($request['action'])
{
    case '404':
        http_response_code(404);
        echo "Error 404: Por más que busco, no encuentro.";
    break;
    case '405':
        http_response_code(405);
        echo "Error 405: La dirección está muy mal puesta";
    break;
}


