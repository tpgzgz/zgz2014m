<?php

switch ($request['action'])
{
    case '400':
        echo "Error 400: Increíble,ble: Acción inválida.";
    break;
    case '404':
        echo "Error 404: Por más que busco, no encuentro.";
    break;
    case '405':
        echo "Error 405: La dirección está muy mal puesta";
    break;
}


