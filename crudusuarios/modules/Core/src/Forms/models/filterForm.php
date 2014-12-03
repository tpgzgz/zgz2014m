<?php

/**
 * Filtrado de campos de formularios
 * @param unknown $userForm
 * @param unknown $post
 * @return string
 */

function filterForm($userForm, $post)
{
    foreach($post as $key => $value)
    {
        foreach($userForm[$key]['filters'] as $filter)
        switch($filter){
            case ('stripTrim'):
                $value = trim($value);
            break;                                    
            case ('escape'):
<<<<<<< HEAD

                 $value = str_replace('"', '', escapeshellarg($value));

=======
                 $value = htmlentities($value);
>>>>>>> 0b1ca7e03bf24015815565230630d198889f6554
            break; 
            case ('stripTags'):
                $value = strip_tags($value);
            break;
        }          
        $post[$key] = $value;       
    }
    return $post;
}
