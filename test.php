<?php

$a = 0;

for ($i=0 ;$i<= 160; $i++) {
    $a = $i & 8;
    $b = $i &16;
    $c = $i | 8;
    if ($a != 8 && $b != 16) {
        //echo "true" . $i ."aa" . $c ."\r\n" ;
    } else {
        //echo "false" . $i;
    }
    $d = $i | 8;
    if ($d == 72) {
        echo "true" . $i ."aa" . $d ."\r\n" ;
    }
}

