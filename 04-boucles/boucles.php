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

echo '<br/> <br/> <br/>  exercice 3 PGCD <br/> <br/>';

$nombre1 = 8;
$nombre2 = 12;
$reste = null;
$pgcd = null;

// Boucle while


var_dump(null !== 0); // var_dump permet d'afficher le type et le résultat : bool: true dans ce cas

echo ' le PGCD de ' . $nombre1 . ' et ' . $nombre2 . ' est ';
$dividende = $nombre1;
$diviseur = $nombre2;

while ($reste !== 0) {
    $pgcd = $diviseur;
    $reste = $dividende % $diviseur;
    $dividende = $diviseur;

    $diviseur = $reste;

    if ($reste == 0) {
       echo $pgcd;
    }
}


echo '<br/> <br/> <br/>  exercice 4 Exercice FizzBuzz  <br/> <br/>';
 
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