<?php

$poule = '🐔'; 
$coq = '🐓';

/*    for ($i=0; $i <= 10; $i++) {
        for ($j=0; $j <= 10; $j++) {
            echo $poule;
    }
        echo ('<br/>');
}

echo '<br/> <br/> <br/>';


for ($i=0; $i <= 10; $i++) {
    for ($j=0; $j <= $i; $j++) {
        echo $poule;
}
    echo '<br/>';
}

echo '<br/> <br/> <br/>';
*/

$start = 5;
$size= 1;




for ($i=0; $i < 6; $i++) {
    
    for ($j=0; $j < 11; $j++) {
        if ($j==$start) {
           echo $poule;
           for ($a=0; $a < $size; $a++) {
            
            echo $poule;
           }
          $j += $size - 1;
        } else {
            echo $coq;
        }
        
    }

    $start--;
    $size+=2;
    echo "<br/>";
}


