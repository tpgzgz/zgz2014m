<?php
/**
 * Dibuja la matriz de las multiplicaciones
 * @param array dibujamatriz
 */

function dibujamatriz($matriz){
    $m1=sizeof($matriz);
    $m2=sizeof($matriz[0]);
    $a=0;
    $b=0;
    print ("<table border=1>");
    for($a=0; $a<=$m2; $a++){
        print("<tr>");
        for($b=0; $b<=$m1; $b++){
           print("<td>");
           print($matriz[$a]($b));
           print("</td>");
                }
         print("</tr>");
            }
}
            
