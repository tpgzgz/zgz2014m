<?php
/**
 * Dibuja la matriz de las multiplicaciones
 * @param array dibujamatriz
 */

function dibujamatriz($matriz){
    $m1=sizeof($matriz)-1;
    $m2=sizeof($matriz[0])-1;
//     $m1=5;
//     $m2=10;
    $a=0;
    $b=0;
//     $c=0;
    echo ("<table border=1>");
    for($a=0; $a<=$m1; $a++){
        echo("<tr>");
        for($b=0; $b<=$m2; $b++){
           echo("<td>");
           echo($matriz[$a][$b]);
//            echo("$c");
//            $c++;
           echo("</td>");
                }
         echo("</tr>");
            }
}
            
