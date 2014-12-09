<?php

function uuidGen()
{
    $hex = array (0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e');
    $uuid = '';
    for($i = 0; $i < 32; $i++)
    {
        if($i == 8 | $i == 13 | $i == 18 | $i == 23)
            $uuid .= '-';                
        else
            $uuid .= $hex[array_rand ($hex)];
    }
    return $uuid;
}

