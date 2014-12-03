<?php
/**
 * 
 * @param int $a
 * @param int $b
 * @return array
 */
function tablaDeMultiplicar ($a, $b) {
    for ($i = 0; $i <= $a; $i++) {
        for ($j = 0; $j <= $b; $j++) {
            if ($i == 0) {
                $matriz[$i][$j] = $j;
            } else if ($j == 0) {
                $matriz[$i][$j] = $i;
            } else {
                $matriz[$i][$j] = $i * $j;
            }
        }
    }
    
    return $matriz;
}