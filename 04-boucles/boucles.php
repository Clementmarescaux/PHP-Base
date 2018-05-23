<?php
echo 'exercice 1 <br/>';

for ($i = 10; $i>0; $i--) {
    echo $i . " - ";
} 

echo '<br/> <br/> <br/>  exercice 2  <br/> <br/>';

for ($i=0; $i <= 100; $i++){ 
    if ($i % 2 === 0) { 
        echo ($i) . " - "; 
    }
 }

echo '<br/> <br/> <br/>  exercice 3  <br/> <br/>';



echo '<br/> <br/> <br/>  Exercice FizzBuzz  <br/> <br/>';
 
 for ($i=1; $i <= 100; $i++) {
    if ($i % 3 === 0 && $i % 5 !== 0 ) { 
        echo "Fizz" . "<br/>"; 
    } elseif ($i % 5 === 0 && $i % 15 !== 0 ) { 
        echo "Buzz" . "<br/>"; 
    } elseif ($i % 15 === 0) { 
        echo "FizzBuzz" . "<br/>";
    } else {
        echo $i . "<br/>";
    }
 }