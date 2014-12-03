<?php
/**
 * Fibonacci
 *
 * @param int $max
 * @return array
 */

function fibonacci ($max)
{
    $f0=0;
    $f1=1;
    $f2=$f0+$f1;
    $i=2;
    
    $matrizFibonacci[0]=0;
    $matrizFibonacci[1]=1;
   
    while ($f2<=$max){
       
        $matrizFibonacci[$i]=$f2.",";
        $f0=$f1;
        $f1=$f2;
        $f2=$f0+$f1;
        $i++;
        
    }
    
    return $matrizFibonacci;
}